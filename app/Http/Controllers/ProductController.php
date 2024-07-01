<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);

        return view('products.content', [
            'title' => $product->product_name,
            'product' => $product,
            'products' => $productsMore
        ]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('product_name', 'like', '%' . $query . '%')
                           ->get();
        return view('products.search', compact('products', 'query'))->with('title', 'Tìm kiếm');
    }
}
