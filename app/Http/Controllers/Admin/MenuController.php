<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService){
        $this->menuService=$menuService;
    }

    public function create() {
        return view('admin/menu/add',[
            'title' => 'Thêm Danh Mục',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request) {
        $this->menuService->create($request);
        return redirect('/admin/menus/list');
    }

    public function index() {
        return view('admin.menu.list',[
            'title'=>'Danh sách danh mục',
            'menus'=>$this->menuService->getAll()
        ]);
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $menu->menu_name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($request, $menu);

        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request) {
       $result=$this->menuService->destroy($request);
       if($result){
        return response()->json([
            'error'=>false,
            'message'=>'Xóa thành công'
        ]);
       }
       return response()->json([
        'error'=>true
    ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Xử lý tìm kiếm sản phẩm với từ khóa $query
        $menus = Menu::where('menu_name', 'like', '%' . $query . '%')
                           ->get();

        // Trả về view hiển thị kết quả tìm kiếm
        return view('admin.menu.search', compact('menus', 'query'))->with('title', 'Tìm kiếm danh mục');
    }
}
