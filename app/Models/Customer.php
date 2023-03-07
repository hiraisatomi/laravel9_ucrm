<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

class Customer extends Model
{
    use HasFactory;

    // →CustomerControllerのstore→Requires/StoreCustomerRequestで設定
    protected $fillable = [
        'name', 'kana', 'tel', 'email',
        'postcode', 'address', 'birthday', 'gender', 'memo' ];


    // 顧客検索
    public function scopeSearchCustomers($query, $input = null)
    {
        if(!empty($input)) {
            if(Customer::where('kana', 'like', $input . '%' )
            ->orWhere('tel', 'like', $input . '%' )->exists())
            {
                return $query->where('kana', 'like', $input . '%' )
                ->orWhere('tel', 'like', $input . '%' );
            }
        }
    }

    // リレーション設定(Models/Purchase.php側でも)
    // 一対多 hasMany↔belongsTo purchaseは多なので複数形
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
