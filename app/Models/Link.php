<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ["created_at","updated_at",'deleted_at'];
    protected $fillable = [
        "code",
        "firstname",
        "lastname",
        "age",
        "addressText",
        "addressCoordinates",
        "phone",
        "gender",
        "maritalStatus",
        "isEditable",
        "lastEditAt",
        "from",
        "to",
        "creatorId",
        "creatorName"
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
