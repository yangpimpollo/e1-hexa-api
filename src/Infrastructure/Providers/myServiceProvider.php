<?php

namespace yangpimpollo\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use yangpimpollo\Domain\Repository\BookRepositoryInterface;
use yangpimpollo\Infrastructure\Persistence\EloquentBookRepository;

class myServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bindings de Libros
        $this->app->bind(
            BookRepositoryInterface::class,
            EloquentBookRepository::class
        );

        // Aquí podrás añadir más bindings a medida que crezca el proyecto
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
