<?php

Route::resource(
    '/products',
    'Demo\ProductsController',
    ['only' => ['index']]
);
