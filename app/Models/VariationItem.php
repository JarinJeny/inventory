<?php

namespace App\Models;

use App\Models\Variation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationItem extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }
}
