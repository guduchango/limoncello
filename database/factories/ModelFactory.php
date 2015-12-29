<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1,10),
        'name' => $faker->domainWord,
        'abbreviation' => $faker->numerify('t_###'),
        'description' => $faker->sentence(200),
        'logo_extension' => $faker->randomElement(['png','jpg']),
        'street_name' => $faker->streetName,
        'street_number' => $faker->numberBetween(150,900),
        'phone' => $faker->numberBetween(32793622,40588588),
    ];

});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Entity::class, function (Faker\Generator $faker) {

    return [
        'company_id' => $faker->numberBetween(1,10),
        'author_id' => $faker->numberBetween(1,30),
        'name' => $faker->firstName,
        'document' => $faker->numberBetween(32793622,40588588),
        'contact_name' => $faker->firstName,
        'street_name' => $faker->streetName,
        'street_number' => $faker->numberBetween(150,900),
        'aditional_info' => $faker->sentence(100),
        'email' => $faker->email,
        'phone' => $faker->numberBetween(32793622,40588588),
        'pricelist_id' => $faker->numberBetween(1,10),
        'type' =>$faker->randomElement(['client','supplier','employee','creditor','subdist']),
        'tax_id' => $faker->numberBetween(1,10),
        'observation' => $faker->sentence(200),
    ];
});

$factory->define(App\Models\Pricelist::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->numerify('price_###'),
        'company_id' => $faker->numberBetween(1,10),
        'percent_price' => $faker->randomFloat(2, 100,1500 ),
        'percent_subdist' => $faker->randomFloat(2, 100,1500 ),
        'percent_prevent' => $faker->randomFloat(2, 100,1500 ),
    ];

});
$factory->define(App\Models\PricelistProduct::class, function (Faker\Generator $faker) {

    return [
        'product_id' => $faker->numberBetween(1,30),
        'pricelist_id' => $faker->numberBetween(1,10),
        'price' => $faker->randomFloat(2, 100,1500 ),
        'currency_id' => $faker->numberBetween(1,10),
        'percent_subdist'=>  $faker->randomFloat(2, 100,1500 ),
        'percent_prevent'=>  $faker->randomFloat(2, 100,1500 ),
    ];

});


$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {

    return [
        'author_id' => $faker->numberBetween(1,30),
        'company_id' => $faker->numberBetween(1,10),
        'name' => $faker->numerify('product_###'),
        'description' => $faker->sentence(100),
        'stock' => $faker->numberBetween(1,50),
        'cost' => $faker->randomFloat(2, 100,1500 ),
        'duration' => $faker->numberBetween(1,50),
        'sort' => $faker->randomElement(['servicio','producto']),
        'barcode' => $faker->numerify('codigo_###'),
        'alert_stock' => $faker->numberBetween(1,10),
        'desired_stock' => $faker->numberBetween(1,100),
    ];

});
