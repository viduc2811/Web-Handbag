<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
        // dd(session::get('carts'));
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        $cartProducts = Session::get('carts', []); // Lấy giỏ hàng từ session, nếu không có thì trả về mảng rỗng
    
        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => $cartProducts // Truyền giỏ hàng vào view
        ]);
    }

    public function update(Request $request)
    {
        // $this->cartService->update($request);

        // return redirect('/carts');
        $result = $this->cartService->update($request);

        if (!$result['success']) {
            return redirect()->back()->withErrors([$result['message']]);
        }

        return redirect()->back()->with('success', $result['message']);
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);

        return redirect()->back();
    }
}
