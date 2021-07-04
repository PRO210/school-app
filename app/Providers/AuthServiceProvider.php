<?php

namespace App\Providers;

use App\Models\{
    User,
    Permission
};
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\ResetPassword;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) return;

        $this->registerPolicies();

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return 'https://example.com/reset-password?token=' . $token;
        });

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission->name);
            });
        }

        Gate::define('owner', function (User $user, $object) {
            return $user->id === $object->user_id;
        });
        /* Essa forma abaixo é como se usa em rotas ou no controller visto o define anterior
        Gate::allows('owner',$product);
        */

        Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        //
    }
}
