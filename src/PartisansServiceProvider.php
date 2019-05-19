<?php

namespace Lotestudio\Partisans;

use Illuminate\Support\ServiceProvider;
use Lotestudio\Partisans\Console\Commands\ViewCommand;
use Lotestudio\Partisans\Console\Commands\VueComponentCommand;

//https://github.com/svenluijten/artisan-view

class PartisansServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ViewCommand::class,
                VueComponentCommand::class,
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            ViewCommand::class,
            VueComponentCommand::class,
        ];
    }
}
