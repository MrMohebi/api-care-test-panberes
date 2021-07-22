<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ["created_at","updated_at",'deleted_at'];

    protected $fillable = [
        "marketerId",
        "marketerName",
        "firstname",
        "lastname",
        "age",
        "addressText",
        "addressCoordinates",
        "phone",
        "gender",
        "maritalStatus",
        "orders",
        "ordersId",
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
