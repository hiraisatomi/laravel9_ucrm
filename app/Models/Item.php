<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // →ItemControllerのstore→Requires/StoreCustomerRequestで設定
    protected $fillable = [
        'name',
        'memo',
        'price',
        'is_selling',
    ];
}
