<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10); 
        $customers = Customer::orderBy('created_at', 'desc')->paginate(10); 
        return view('admin.orders.list', compact('orders', 'customers'));
    }
    public function update(Request $request, Order $order) //Cập nhật trạng thái
    {
        $request->validate([
            'status' => 'required|in:Đang chuẩn bị,Đang vận chuyển,Hoàn thành,Hủy',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }
    public function showDetail($id)
    {
        $order = Order::find($id);
        $title = 'Chi tiết đơn hàng Admin' . $order->order_id;
        return view('admin.orders.order-detail', compact('order','title'));
    }
    
    public function searchByEmail(Request $request)
    {
       $email = $request->input('query');

        $orders = Order::query()
            ->where('email', 'LIKE', "%$email%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

    return view('admin.orders.list', compact('orders', 'email'));
    }

    public function filterByStatus(Request $request)
    {
        $status = $request->status;
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        if ($status === 'Tất cả đơn hàng') {
            $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        } elseif (empty($status)) {
            session()->flash('message', 'Vui lòng chọn trạng thái để lọc đơn hàng.');
        } else {
            $orders = Order::where('status', $status)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
    
        return view('admin.orders.list', compact('orders'));
    }
}