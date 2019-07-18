<?php

namespace Linlak\LinSocial\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class OAuthAccount extends Model
{
    protected $fillable = [
        "user_id", "nick_name", "name", "oauth_id",
        "provider_name", "email", "avatar", "token",
        "refreshToken", "expiresIn", "tokenSecret"
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
