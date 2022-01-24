<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => Config::get('furniture.route.api.prefix'),
    // 'domain' => Config::get('furniture.route.domain'),
    // 'domain' => '{account}.myapp.com',
    'middleware' => 'api',
    'as' => 'furniture::',
    'namespace' => 'Ourgold\Furniture\Controllers'
], function () {
    Route::resource('furniture', 'FurnitureController');
});
