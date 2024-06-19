<?php


namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::all();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('product_price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('product_price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('product_price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
           
            Product::create([
                'product_name' => $request->product_name,
                'menu_id' => $request->menu_id,
                'product_price' => $request->product_price,
                'price_sale' => $request->price_sale,
                'product_description' => $request->product_description,
                'product_content' => $request->product_content,
                'thumb' => $request->thumb,
                'active' => $request->active,
            ]);

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            \Log::info($err->getMessage());
            return  false;
        }

        return  true;
        
    }

    public function get()
    {
        return Product::with('menu')
            ->orderByDesc('product_id')->paginate(15);
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('product_id', $request->input('menu_id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
