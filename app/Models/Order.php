<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'track_no',
        'total_price'
    ];
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
