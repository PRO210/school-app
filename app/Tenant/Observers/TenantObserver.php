<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        // O app Cria o Objeto e o bind automaticamente
        $managerTenant = app(ManagerTenant::class);
        $identify = $managerTenant->getTenantIdentify();

        if ($identify)
            $model->tenant_id = $identify;
    }
}
