<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        "fullname",
        "email",
        "password",
        "phone",
        "address",
        "level"
    ];
    protected $hidden = ["password"];
    //khai báo thuận
    public function detail(){
        return $this->hasOne(Detail::class,"users_id","id");
    }
}
