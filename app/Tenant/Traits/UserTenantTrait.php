<?php

namespace App\Tenant\Traits;

use App\Tenant\Scopes\UserTenantScope;

trait UserTenantTrait
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(new UserTenantScope);
    }
}
