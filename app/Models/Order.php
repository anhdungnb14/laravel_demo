<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "address",
        "email",
        "phone",
        "total",
        "state"
    ];
    public function orderProduct(){
        return $this->hasMany(OrderProduct::class,"orders_id","id");
    }
}
