<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
 // Use comma instead of compact() function
        ]);
    }
    
//     public function search(Request $request)
// {
//     $name = $request->input('name');
//     $phone = $request->input('phone');
//     $email = $request->input('email');

//     $orders = Order::select('orders.*', 'customers.name as customer_name')
//                   ->join('customers', 'orders.customer_id', '=', 'customers.id')
//                   ->where(function ($query) use ($name, $phone, $email) {
//                       if (!empty($name)) {
//                           $query->where('customers.name', 'like', "%$name%");
//                       }
//                       if (!empty($phone)) {
//                           $query->where('customers.phone', 'like', "%$phone%");
//                       }
//                       if (!empty($email)) {
//                           $query->where('customers.email', 'like', "%$email%");
//                       }
//                   })
//                   ->orderByDesc('orders.created_at')
//                   ->get();

//     return view('order', [
//         'title' => 'Order',
//         'orders' => $orders,
//     ]);
// }
public function search(Request $request)
{
    $name = $request->input('name');
    $phone = $request->input('phone');
    $email = $request->input('email');
    $query = $request->input('query');
    // Kiểm tra người dùng nhập đủ thông tin
    if (empty($name) || empty($phone) || empty($email)) {
        return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin để tìm kiếm đơn hàng.');
    }

    // Tìm kiếm đơn hàng
    $orders = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
                    ->where('customers.name', 'like', '%' . $name . '%')
                    ->where('customers.phone', 'like', '%' . $phone . '%')
                    ->where('customers.email', 'like', '%' . $email . '%')
                    ->select('orders.*', 'customers.name as customer_name')
                    ->orderByDesc('orders.created_at')
                    ->get();

    // Trả về view với kết quả tìm kiếm
    $title = 'Kết quả tìm kiếm đơn hàng';
    return view('orders.list', compact('orders', 'query'))->with('title', 'Tìm kiếm');
    // return view('orders.list', compact('orders', 'title'));
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
