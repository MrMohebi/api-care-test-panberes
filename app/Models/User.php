<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

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
        "introducerId",
        'linksId',
        "subsetsId",
        "token",
        "username"
    ];

    public function links(){
        return $this->hasMany(Link::class);
    }
}
