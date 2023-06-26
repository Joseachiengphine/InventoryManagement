<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['product_id'];

    protected $table = 'products';

    protected $primaryKey = 'product_id';

    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'supplier_id','product_id');
    }
}
