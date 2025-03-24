<?php

namespace Lukawar\Aiatar;

use Illuminate\Support\ServiceProvider;
use Lukawar\Aiatar\Aiatar;

class AiatarServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Aiatar::class, fn() => new Aiatar());
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/aiatar.php' => config_path('aiatar.php'),
        ], 'config');
    }
}