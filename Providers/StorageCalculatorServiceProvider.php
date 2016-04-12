<?php namespace Modules\StorageCalculator\Providers;

use Illuminate\Support\ServiceProvider;

class StorageCalculatorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\StorageCalculator\Repositories\PackagingRepository',
            function () {
                $repository = new \Modules\StorageCalculator\Repositories\Eloquent\EloquentPackagingRepository(new \Modules\StorageCalculator\Entities\Packaging());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\StorageCalculator\Repositories\Cache\CachePackagingDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\StorageCalculator\Repositories\StorageRepository',
            function () {
                $repository = new \Modules\StorageCalculator\Repositories\Eloquent\EloquentStorageRepository(new \Modules\StorageCalculator\Entities\Storage());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\StorageCalculator\Repositories\Cache\CacheStorageDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\StorageCalculator\Repositories\VolumesRepository',
            function () {
                $repository = new \Modules\StorageCalculator\Repositories\Eloquent\EloquentVolumesRepository(new \Modules\StorageCalculator\Entities\Volumes());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\StorageCalculator\Repositories\Cache\CacheVolumesDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\StorageCalculator\Repositories\DiscountsRepository',
            function () {
                $repository = new \Modules\StorageCalculator\Repositories\Eloquent\EloquentDiscountsRepository(new \Modules\StorageCalculator\Entities\Discounts());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\StorageCalculator\Repositories\Cache\CacheDiscountsDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\StorageCalculator\Repositories\Discount_quantityRepository',
            function () {
                $repository = new \Modules\StorageCalculator\Repositories\Eloquent\EloquentDiscount_quantityRepository(new \Modules\StorageCalculator\Entities\Discount_quantity());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\StorageCalculator\Repositories\Cache\CacheDiscount_quantityDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\StorageCalculator\Repositories\Discount_periodRepository',
            function () {
                $repository = new \Modules\StorageCalculator\Repositories\Eloquent\EloquentDiscount_periodRepository(new \Modules\StorageCalculator\Entities\Discount_period());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\StorageCalculator\Repositories\Cache\CacheDiscount_periodDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\StorageCalculator\Repositories\Discount_flatRepository',
            function () {
                $repository = new \Modules\StorageCalculator\Repositories\Eloquent\EloquentDiscount_flatRepository(new \Modules\StorageCalculator\Entities\Discount_flat());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\StorageCalculator\Repositories\Cache\CacheDiscount_flatDecorator($repository);
            }
        );
// add bindings







    }
}
