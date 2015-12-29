<?php

Route::resource(
    '/entities',
    'Demo\EntitiesController',
    ['only' => ['index', 'show', 'store', 'update', 'destroy']]
);
