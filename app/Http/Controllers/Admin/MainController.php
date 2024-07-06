<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    
    public function index()
    {
        $revenues = DB::table('orders')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_amount) as total_revenue'), DB::raw('COUNT(*) as total_orders'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

            $productInventory = DB::table('products')
    ->select('product_id', 'product_name', 'product_quantity') 
    ->get();
        return view('admin.home', [
            'title' => 'admin',
            'revenues' => $revenues,
             'productInventory' => $productInventory,
        ]);
    }
}
