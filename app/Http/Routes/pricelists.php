<?php

Route::resource(
    '/pricelists',
    'Demo\PricelistsController',
    ['only' => ['index', 'show', 'store', 'update', 'destroy']]
);
