<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ["created_at","updated_at",'deleted_at'];
    protected $fillable = [
      "uid",
      "avatar",
      "firstname",
      "lastname",
      "phone",
      "email",
      "rank",
      "topLeader",
      "topLeaderId",
      'linksId',
      "subsetsId",
      "token",
      "username"
    ];

    public function links(): HasMany{
        return $this->hasMany(Link::class);
    }
}
