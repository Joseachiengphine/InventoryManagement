<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_History extends Model
{
    use HasFactory;

    protected $guarded = ['product_histories_id'];

    protected $table = 'product_histories';

    protected $primaryKey = 'product_histories_id';
}
