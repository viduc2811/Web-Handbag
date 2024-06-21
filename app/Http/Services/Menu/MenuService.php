<?php

namespace App\Http\Services\Menu;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
class MenuService
{
    public function getParent($parent_id=0){
        return Menu::where('parent_id',0)->get();
    }

    public function show()
    {
        return Menu::select('menu_name', 'menu_id')
            ->where('parent_id', 0)
            ->orderbyDesc('menu_id')
            ->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('menu_id')->paginate(20);
    }


    public function create($request){

        try{
            Menu::create([
            'menu_name'=>(string) $request->input('menu_name'),
            'slug'=>Str::slug($request->input('slug'),'-'),
            'menu_description'=>(string) $request->input('menu_description'),
            'parent_id'=>(int) $request->input('parent_id'),
            ]);
            Session::flash('success','Tạo danh mục thành công');
        }catch(\Exception $err){
             Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $menu): bool
    {
        if ($request->input('parent_id') != $menu->menu_id) {
            $menu->parent_id = (int)$request->input('parent_id');
        }

        $menu->menu_name = (string)$request->input('menu_name');
        $menu->slug = (string)$request->input('slug');
        $menu->menu_description = (string)$request->input('menu_description');
        $menu->save();
        Session::flash('success', 'Cập nhật thành công Danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('menu_id');
        $menu = Menu::where('menu_id', $id)->first();
        if ($menu) {
            return Menu::where('menu_id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function getId($id)
    {
        return Menu::where('menu_id', $id)->firstOrFail();
        dd($menu);
    }

    public function getProduct($menu, $request)
    {
        $query = $menu->products()
            ->select('product_id', 'product_name', 'product_price', 'price_sale', 'thumb')
            ->where('active', 1);

        if ($request->input('product_price')) {
            $query->orderBy('product_price', $request->input('product_price'));
        }

        return $query
            ->orderByDesc('product_id')
            ->paginate(12)
            ->withQueryString();
    }
}