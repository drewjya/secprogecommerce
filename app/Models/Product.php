<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'small_descriptions',
        'descriptions',
        "original_price",
        "selling_price",
        "tax",
        "image",
        "quantity",
        "status",
        "trending",
        "meta_title",
        "meta_keywords",
        "meta_descriptions",
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
}
