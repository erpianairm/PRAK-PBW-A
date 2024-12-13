<?php

namespace App\Providers;

use App\Policies\StorePolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::policy(Store::class,  StorePolicy::class);
        Gate::define('isPartner', fn (User $user) => $user->isAdmin() || $user->isPartner());
        Model::preventLazyLoading(!app()->isProduction());

    }
}
