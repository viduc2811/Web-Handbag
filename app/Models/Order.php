<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'customer_id', 'customer_name', 'phone', 'address', 'email', 'note', 'total_amount'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
