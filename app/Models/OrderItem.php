<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $dates = ["created_at","updated_at"];
    protected $fillable = [
        "name",
        "price",
        "remindAt",
        "details",
        "note",
    ];

    public function order(): BelongsTo{
        return $this->belongsTo(Order::class);
    }
}
