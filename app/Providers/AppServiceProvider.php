<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Package;
use App\Models\ServiceVariant;
use Illuminate\Support\Facades\Blade;


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

        Blade::directive('formatDate', function ($date) {
            return "<?php echo \Carbon\Carbon::parse($date)->format('F j, Y g:i a'); ?>";
        });
    }
}
