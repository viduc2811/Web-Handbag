<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\View\Composers\MenuComposer;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{
    protected $sliderService;
    protected $menuService;
    protected $productService;
    public function __construct(SliderService $slider, MenuService $menu, ProductService $product) 
{
    $this->slider = $slider;
    $this->menu = $menu;
    $this->product = $product;
}
    public function index()
    {
        $cartProducts = Session::get('carts', []);
        return view('home', [
            'title' => 'HandBags Store',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get(),
            'carts' => $cartProducts
        ]);
        
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
}