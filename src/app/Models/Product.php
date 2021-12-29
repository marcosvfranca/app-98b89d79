<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'sku', 'initial_quantity'
    ];

    public function movements()
    {
        return $this->hasMany(ProductMovement::class);
    }

    public function getCurrentQuantityAttribute()
    {
        return $this->initial_quantity + $this->movements->sum('quantity');
    }
}
