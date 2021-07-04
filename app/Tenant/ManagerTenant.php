<?php

namespace App\Tenant;

class ManagerTenant
{
    /*
     *Identificador do Tenant através do usúario logado
     */
    public function getTenantIdentify()
    {
        return auth()->check() ? auth()->user()->tenant_id : '';
    }
    /*
    * Relacionamento do Usuário com o Tenant
    */
    public function getTenant()
    {
        return auth()->check() ? auth()->user()->tenant : '';
    }
   /*
    * Super Admin
    */
    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
