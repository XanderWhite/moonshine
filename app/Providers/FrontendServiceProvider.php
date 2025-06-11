<?php
namespace App\Providers;

use App\Frontend\Manager;
use Illuminate\Support\ServiceProvider;

class FrontendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('tao.frontend', function() {
            return Manager::instanse();
        });
    }
}