<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['product_suppliers_id'];

    protected $table = 'product_suppliers';

    protected $primaryKey = 'product_suppliers_id';
}
