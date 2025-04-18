<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('isDokter', function ($user) {
            return $user->role === 'dokter';
        });

        Gate::define('isKasir', function ($user) {
            return $user->role === 'kasir';
        });

        Gate::define('isPetugasPendaftaran', function ($user) {
            return $user->role === 'petugas_pendaftaran';
        });

        // atau pakai generic gate
        Gate::define('role', function ($user, $role) {
            return $user->role === $role;
        });
    }
}
