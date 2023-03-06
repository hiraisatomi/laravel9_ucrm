<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function scopeSearchCustomers($query, $input = null)
    {
        // 顧客検索
        if(!empty($input)) {
            if(Customer::where('kana', 'like', $input . '%' )
            ->orWhere('tel', 'like', $input . '%' )->exists())
            {
                return $query->where('kana', 'like', $input . '%' )
                ->orWhere('tel', 'like', $input . '%' );
            }
        }
    }
}
