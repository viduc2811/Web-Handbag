<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    
    public function index()
    {
        //Doanh thu
            $revenues = DB::table('orders')
            ->where('status', 'Hoàn thành')
            ->select(DB::raw('DATE(updated_at) as date'), 
            DB::raw('SUM(total_amount) as total_revenue'), 
            DB::raw('COUNT(*) as total_orders'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->paginate(5, ['*'], 'revenuePage');

        // Doanh thu theo thang
        $monthlyRevenues = DB::table('orders')
            ->where('status', 'Hoàn thành')
            ->select(DB::raw('MONTH(updated_at) as month'), DB::raw('YEAR(updated_at) as year'),
                DB::raw('SUM(total_amount) as total_revenue'))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

         // Chi phi nhap hang da ban theo thang
         $monthlyCosts = DB::table('carts')
         ->join('products', 'carts.product_id', '=', 'products.product_id')
         ->join('customers', 'customers.id', '=', 'carts.customer_id')
         ->join('orders', 'orders.customer_id', '=', 'customers.id')
         ->select(DB::raw('MONTH(carts.created_at) as month'), DB::raw('YEAR(carts.created_at) as year'),
             DB::raw('SUM(carts.product_quantity * products.cost_price) as total_cost'))
            ->where('orders.status', 'Hoàn thành')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        //Loi nhuan
         $profits = [];
         foreach ($monthlyRevenues as $revenue) {
            $monthKey = $revenue->year . '-' . str_pad($revenue->month, 2, '0', STR_PAD_LEFT);
            $totalCost = 0;
            foreach ($monthlyCosts as $cost) {
                if ($cost->year == $revenue->year && $cost->month == $revenue->month) {
                    $totalCost = $cost->total_cost;
                    break;
                }
            }
            $profits[$monthKey] = $revenue->total_revenue - $totalCost;
        }
        

        //Ton kho
            $productInventory = DB::table('products')
            ->select('product_id', 'product_name', 'product_quantity') 
            ->paginate(5, ['*'], 'inventoryPage');

        //SP ban chay
            $bestSellingProducts = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.product_id')
            ->select('products.product_id', 'products.product_name', DB::raw('SUM(carts.product_quantity) as total_sold'))
            ->groupBy('products.product_id', 'products.product_name')
            ->orderBy('total_sold', 'desc')
            ->paginate(5, ['*'], 'bestSellingPage');

            return view('admin.home', [
            'title' => 'admin',
            'revenues' => $revenues,
             'productInventory' => $productInventory,
             'bestSellingProducts' => $bestSellingProducts,
             'profits' => $profits,
             'monthlyCosts'=>$monthlyCosts,
             'monthlyRevenues' => $monthlyRevenues,
        ]);
    }
}