<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'discount'];
    public function orders()
    {
        return $this->hasMany(Order::class, 'voucher_id');
    }
}
