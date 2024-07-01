<?php


namespace App\Helpers;
use App\Models\Menu;
use Illuminate\Support\Str;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $parentMenu = Menu::where('menu_id', $menu->parent_id)->first();
        
                // Kiểm tra xem danh mục cha có tồn tại không và hiển thị tên của nó
                if ($parentMenu) {
                    $parentName = $parentMenu->menu_name;
                } else {
                    $parentName = 'Không có danh mục cha';
                }
                $html .= '
                    <tr>
                        <td>' . $key + 1 . '</td>
                        <td>' . $char . $menu->menu_name . '</td>
                        <td>' . $parentName . '</td>
                        <td>' . $menu->updated_at . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->menu_id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $menu->menu_id . ', \'/admin/menus/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->menu_id, $char . '');
            }
        }

        return $html;
    }

    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }

    public static function menus($menus, $parent_id = 0) :string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $menu->menu_id . '-' . Str::slug($menu->menu_name, '-') . '.html">
                            ' . $menu->menu_name . '
                        </a>';

                unset($menus[$key]);

                if (self::isChild($menus, $menu->menu_id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menus($menus, $menu->menu_id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
        
    }

    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }
    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0)  return number_format($price);
        return '<p>Sản phẩm này hiện đã hết</p>';
    }
    public static function quantity($product_quantity = 0)
{
    return $product_quantity != 0 ? $product_quantity : '<p>Sản phẩm này hiện đã hết</p>';
}

}