<?php

namespace App\Models;

use App\Tenant\Traits\UserTenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    use UserTenantTrait;

    protected $fillable = [
        'uuid', 'cnpj', 'name', 'url', 'email', 'logo', 'timbre', 'active', 'subscription', 'expires_at', 'subscription_id', 'subscription_active',
        'subscription_suspended', 'INEP', 'CADASTRO', 'DO', 'ATO', 'ENDERECO', 'CIDADE', 'ESTADO', 'CEP','plan_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function classifications()
    {
        return $this->hasMany(Classification::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }
    public function documents()
    {
        return $this->hasMany(Documento::class);
    }

    public function solicitations()
    {
        return $this->hasMany(Solicitation::class);
    }

    public function classes()
    {
        return $this->hasMany(Turma::class);
    }

    public function shifts()
    {
        return $this->hasMany(Turno::class);
    }
    public function archives()
    {
        return $this->hasMany(Archive::class);
    }
}
