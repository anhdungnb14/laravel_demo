<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        "users_id",
        "sex"
    ];
    //khai báo nghịch
    public function user(){
        return $this->belongsTo(User::class,"users_id","id");
    }
}
