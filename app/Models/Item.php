<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

class Item extends Model
{
    use HasFactory;

    // →ItemControllerのstore→Requires/StoreItemRequestで設定
    protected $fillable = [
        'name',
        'memo',
        'price',
        'is_selling',
    ];

    // Models/Item.php側でもリレーション設定
    // 多対多 belongsToMany 多なので複数形
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)
        ->withPivot('quantity');
    }
}
