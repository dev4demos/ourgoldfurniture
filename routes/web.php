<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => Config::get('furniture.route.web.prefix'),
    // 'domain' => Config::get('furniture.route.domain'),
    // 'domain' => '{account}.myapp.com',
    'middleware' => 'web',
    'as' => 'furniture::',
    'namespace' => 'Ourgold\Furniture\Controllers'
], function () {
    // Routes defined here have the web middleware applied
    // like the web.php file in a laravel project
    // They also have an applied controller namespace and a route names.

    Route::middleware('furniture')->group(function () {
        // Routes defined here have the self-assigned middleware applied.
        // By default this middleware is empty.
    });
});
