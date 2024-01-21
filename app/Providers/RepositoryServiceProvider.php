<?php

namespace App\Providers;

use App\Repositories\PostalCodeRepository;
use App\Repositories\PostalCodeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostalCodeRepositoryInterface::class, PostalCodeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
