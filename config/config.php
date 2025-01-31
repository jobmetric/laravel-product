<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cache Time
    |--------------------------------------------------------------------------
    |
    | Cache time for get data product
    |
    | - set zero for remove cache
    | - set null for forever
    |
    | - unit: minutes
    */

    "cache_time" => env("PRODUCT_CACHE_TIME", 0),

    /*
    |--------------------------------------------------------------------------
    | Table Name
    |--------------------------------------------------------------------------
    |
    | Table name in database
    */

    "tables" => [
        'product_interface_physical' => 'product_interface_physicals',
        'product_interface_service' => 'product_interface_services',
        'product_interface_digital' => 'product_interface_digitals',
        'product_interface_asset' => 'product_interface_assets',
        'product' => 'products',
    ],

];
