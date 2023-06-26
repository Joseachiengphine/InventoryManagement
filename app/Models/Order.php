<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['order_id'];

    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    public function Customer(): HasMany
    {
        return $this->hasMany(Customer::class,'customer_id','order_id');
    }
}
