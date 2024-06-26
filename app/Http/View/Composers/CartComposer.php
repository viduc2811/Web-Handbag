<?php


namespace App\Http\View\Composers;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        $products = Product::select('product_id', 'product_name', 'product_price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('product_id', $productId)
            ->get();

        $view->with('products', $products);
    }
}