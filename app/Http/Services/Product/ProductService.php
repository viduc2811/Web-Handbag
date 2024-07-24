<?php


namespace App\Http\Services\Product;


use App\Models\Product;

class ProductService
{
    const LIMIT = 16;

    public function get($page = null)
    {
        return Product::select('product_id', 'product_name', 'product_price', 'price_sale', 'thumb','product_quantity','cost_price')
            ->where('active', 1)
            ->orderByDesc('product_id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return Product::where('product_id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::select('product_id', 'product_name', 'product_price', 'price_sale', 'thumb','product_quantity','cost_price')
            ->where('active', 1)
            ->where('product_id', '!=', $id)
            ->orderByDesc('product_id')
            ->limit(8)
            ->get();
    }
}
