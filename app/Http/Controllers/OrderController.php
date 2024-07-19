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
        $carts = Cart::orderByDesc('created_at')->get();
        return view('orders.search', [
            'title' => 'Danh sách hóa đơn',
            'orders' => $orders,
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
    public function showDetail($id)
    {
        $order = Order::find($id);
        $title = 'Chi tiết đơn hàng ' . $order->order_id;
        return view('orders.order-detail', compact('order','title'));
    }
    public function edit($order_id) //sửa thông tin vận chuyển
    {
        $order = Order::findOrFail($order_id);
    $title = 'Sửa thông tin vận chuyển'; 

    return view('orders.edit', compact('order', 'title'));
    }
    public function updateInfor(Request $request, $order_id)
    {
        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required|regex:/[0-9]{9,10}/', 
            'address' => 'required',
            
        ], [
            'customer_name.required' => 'Vui lòng nhập tên khách hàng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Vui lòng nhập địa chỉ',
            
            
        ]);
        $order = Order::findOrFail($order_id);
        
        $order->customer_name = $request->input('customer_name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->content = $request->input('content');

        $order->save();

        return redirect()->route('order.detail', ['order_id' => $order->order_id])->with('success', 'Cập nhật thông tin đơn hàng thành công');
    }
}
