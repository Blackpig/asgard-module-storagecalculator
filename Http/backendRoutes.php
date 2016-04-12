<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/storagecalculator'], function (Router $router) {
    $router->bind('packagings', function ($id) {
        return app('Modules\StorageCalculator\Repositories\PackagingRepository')->find($id);
    });
    get('packagings', ['as' => 'admin.storagecalculator.packaging.index', 'uses' => 'PackagingController@index']);
    get('packagings/create', ['as' => 'admin.storagecalculator.packaging.create', 'uses' => 'PackagingController@create']);
    post('packagings', ['as' => 'admin.storagecalculator.packaging.store', 'uses' => 'PackagingController@store']);
    get('packagings/{packagings}/edit', ['as' => 'admin.storagecalculator.packaging.edit', 'uses' => 'PackagingController@edit']);
    put('packagings/{packagings}/edit', ['as' => 'admin.storagecalculator.packaging.update', 'uses' => 'PackagingController@update']);
    delete('packagings/{packagings}', ['as' => 'admin.storagecalculator.packaging.destroy', 'uses' => 'PackagingController@destroy']);

    $router->bind('storages', function ($id) {
        return app('Modules\StorageCalculator\Repositories\StorageRepository')->find($id);
    });
    get('storages', ['as' => 'admin.storagecalculator.storage.index', 'uses' => 'StorageController@index']);
    get('storages/create', ['as' => 'admin.storagecalculator.storage.create', 'uses' => 'StorageController@create']);
    post('storages', ['as' => 'admin.storagecalculator.storage.store', 'uses' => 'StorageController@store']);
    get('storages/{storages}/edit', ['as' => 'admin.storagecalculator.storage.edit', 'uses' => 'StorageController@edit']);
    put('storages/{storages}/edit', ['as' => 'admin.storagecalculator.storage.update', 'uses' => 'StorageController@update']);
    delete('storages/{storages}', ['as' => 'admin.storagecalculator.storage.destroy', 'uses' => 'StorageController@destroy']);

    $router->bind('volumes', function ($id) {
        return app('Modules\StorageCalculator\Repositories\VolumesRepository')->find($id);
    });
    get('volumes', ['as' => 'admin.storagecalculator.volumes.index', 'uses' => 'VolumesController@index']);
    get('volumes/create', ['as' => 'admin.storagecalculator.volumes.create', 'uses' => 'VolumesController@create']);
    post('volumes', ['as' => 'admin.storagecalculator.volumes.store', 'uses' => 'VolumesController@store']);
    get('volumes/{volumes}/edit', ['as' => 'admin.storagecalculator.volumes.edit', 'uses' => 'VolumesController@edit']);
    put('volumes/{volumes}/edit', ['as' => 'admin.storagecalculator.volumes.update', 'uses' => 'VolumesController@update']);
    delete('volumes/{volumes}', ['as' => 'admin.storagecalculator.volumes.destroy', 'uses' => 'VolumesController@destroy']);

    $router->bind('discounts', function ($id) {
        return app('Modules\StorageCalculator\Repositories\DiscountsRepository')->find($id);
    });
    get('storages/{storage}/discounts/{type}/create', ['as' => 'admin.storagecalculator.discounts.create', 'uses' => 'DiscountsController@create']);
    post('storages/{storage}/discounts', ['as' => 'admin.storagecalculator.discounts.store', 'uses' => 'DiscountsController@store']);
    get('storages/{storage}/discounts/{discounts}/edit', ['as' => 'admin.storagecalculator.discounts.edit', 'uses' => 'DiscountsController@edit']);
    put('discounts/{discounts}/edit', ['as' => 'admin.storagecalculator.discounts.update', 'uses' => 'DiscountsController@update']);
    delete('storages/{storage}/discounts/{discounts}', ['as' => 'admin.storagecalculator.discounts.destroy', 'uses' => 'DiscountsController@destroy']);

// append


});
