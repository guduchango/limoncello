<?php

Route::resource(
    '/companies',
    'Demo\CompaniesController',
    ['only' => ['index', 'show', 'store', 'update', 'destroy']]
);
