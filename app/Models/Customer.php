<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ["created_at","updated_at",'deleted_at'];

    protected $fillable = [
        "marketerId",
        "marketerName",
        "name",
        "age",
        "birth",
        "addressText",
        "addressCoordinates",
        "phone",
        "gender",
        "maritalStatus",
        "orders",
        "ordersId",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
