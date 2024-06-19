<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable=[
        'menu_name',
        'slug',
        'menu_description',
        'parent_id'
    ];
    protected $primaryKey = 'menu_id';

    public function products()
    {
        return $this->hasMany(Product::class, 'menu_id');
    }
}
