<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_description',
        'product_content',
        'menu_id',
        'thumb',
        'cost_price',//
        'product_price',
        'price_sale',
        'product_quantity',
        'active'
        
    ];
    protected $primaryKey = 'product_id';
    public function menu()
{
    return $this->belongsTo(Menu::class, 'menu_id','menu_id')
                ->withDefault(['menu_name' => '']);
}

}
