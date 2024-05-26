<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Expr\Cast\Double;
use Illuminate\Pagination\Paginator;

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
        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 0,',','.').'₫'; ?>";
        });
        Paginator::useBootstrapFive();
    }
}
