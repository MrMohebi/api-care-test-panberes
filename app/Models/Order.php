<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ["created_at","updated_at",'deleted_at'];

    protected $fillable = [
        "customerId",
        "customerName",
        "items",
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
}
