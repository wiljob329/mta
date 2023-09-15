<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Registro_Usuario;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('comunitaria', function(Registro_Usuario $user) {
           return $user->nivel == Registro_Usuario::ROLE_COMUNITARIA; 
        });

        Gate::define('admin', function(Registro_Usuario $user) {
            return $user->nivel == Registro_Usuario::ROLE_ADMIN;
        });

        Gate::define('user', function(Registro_Usuario $user) {
           return $user->nivel == Registro_Usuario::ROLE_USER; 
        });
    }
}
