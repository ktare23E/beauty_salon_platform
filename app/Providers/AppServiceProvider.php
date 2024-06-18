<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Package;
use App\Models\ServiceVariant;

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
        //

        Relation::morphMap([
            'package' => 'App\Models\Package',
            'service_variant' => 'App\Models\ServiceVariant',
        ]);
    }
}
