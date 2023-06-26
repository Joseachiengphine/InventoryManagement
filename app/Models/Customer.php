<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['customer_id'];

    protected $table = 'customers';

    protected $primaryKey = 'customer_id';

    public function Order(): BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id','customer_id');
    }

}

