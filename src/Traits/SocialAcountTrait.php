<?php

namespace Linlak\LinSocial\Traits;

use Linlak\LinSocial\Models\OAuthAccount;

trait SocialAccountTrait
{
    public function oauth_accounts()
    {
        return $this->hasMany(OAuthAccount::class, 'user_id', $this->getAuthIdentifierName());
    }
}
