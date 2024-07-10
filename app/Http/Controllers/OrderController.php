<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Http\Services\CartService;
class OrderController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->get();
        $customers = Customer::orderByDesc('created_at')->get();
        $carts = Cart::orderByDesc('created_at')->get();
        return view('orders.search', [
            'title' => 'Order',
            'orders' => $orders,
            'customers' => $customers,
            'carts' => $carts
        ]);
    }
    
public function search(Request $request)
{
    $user = auth('client')->user();
        if (!$user) {
            return redirect()->back()->with('error', 'Bạn phải đăng nhập để tra cứu hóa đơn.');
        }

        $email = $user->email;

        // Tìm kiếm đơn hàng dựa trên email
        $orders = DB::table('orders')
                    ->join('customers', 'orders.customer_id', '=', 'customers.id')
                    ->where('customers.email', $email)
                    ->select('orders.*', 'customers.name as customer_name')
                    ->orderByDesc('orders.created_at')
                    ->get();

        $title = 'Kết quả tìm kiếm đơn hàng';
        return view('orders.list', compact('orders', 'title'));
    
}

public function showRevenue()
{
    // Lấy dữ liệu doanh thu theo ngày từ database
    $revenues = DB::table('orders')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_amount) as total_revenue'))
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->get();

    return view('admin.revenue', compact('revenues'));
}


}
