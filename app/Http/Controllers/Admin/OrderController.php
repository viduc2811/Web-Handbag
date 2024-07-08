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
        // Lấy danh sách đơn hàng
        $orders = Order::orderBy('created_at', 'desc')->paginate(10); 
        
        // Lấy danh sách khách hàng
        $customers = Customer::orderBy('created_at', 'desc')->paginate(10); 

        // Trả về view 'admin.carts.customer' và truyền biến 'orders' và 'customers'
        return view('admin.carts.customer', compact('orders', 'customers'));
    }
    
}
