<?php

namespace App\Providers;

use App\Frontend\EnvEnvironmentStorage;
use App\Frontend\EnvStorage;
use Illuminate\Support\ServiceProvider;
use Techart\Frontend\Environment;
use Techart\Frontend\PathResolver;

class FrontendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('tao.frontend', function () {
            $env = new Environment(new EnvStorage());
            $pathResolver = new PathResolver(base_path('frontend'), ['bladeCachePath' => storage_path('framework/views')]);

            $frontend = new \Techart\Frontend\Frontend($env, $pathResolver);

            return $frontend;
        });
    }
}
