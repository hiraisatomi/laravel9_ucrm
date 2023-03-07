<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Item;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status',
    ];

    // Models/Customer.php側でもリレーション設定
    // 一対多 hasMany↔belongsTo
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Models/Item.php側でもリレーション設定
    // 多対多 belongsToMany 多なので複数形
    public function items()
    {
        return $this->belongsToMany(Item::class)
        ->withPivot('quantity');
    }
}
