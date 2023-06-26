<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['Supplier_id'];

    protected $table = 'suppliers';

    protected $primaryKey = 'Supplier_id';

    public function Supplier(): HasMany 
    {
        return $this->hasMany(Supplier::class,'product_id','supplier_id');
    }
}
