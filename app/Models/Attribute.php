<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    public function color()
    {
        return $this->hasOne(Color::class,'id', 'color_id');
    }
    public function size()
    {
        return $this->hasOne(Size::class,'id', 'size_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
