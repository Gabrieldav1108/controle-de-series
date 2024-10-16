<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //vai ligar uma interface a uma implementação completa
        $this->app->bind(SeriesRepository::class, EloquentSeriesRepository::class);
    }
}
