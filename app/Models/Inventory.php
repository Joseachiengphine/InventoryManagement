<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = ['Material_id'];

    protected $table = 'inventories';

    protected $primaryKey = 'Material_id';
}
