<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VariationItem;

class Variation extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function variationItems()
    {
        return $this->hasMany(VariationItem::class);
    }

}
