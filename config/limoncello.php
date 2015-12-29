<?php

use \App\User;
use \App\Models\Post;
use \App\Models\Site;
use \App\Models\Author;
use \App\Models\Comment;
use \App\Models\Company;
use \App\Models\Entity;
use \App\Models\Pricelist;
use \App\Models\Product;
use \App\Models\PricelistProduct;
use \App\Schemas\PostSchema;
use \App\Schemas\SiteSchema;
use \App\Schemas\UserSchema;
use \App\Schemas\AuthorSchema;
use \App\Schemas\CommentSchema;
use \App\Schemas\CompanySchema;
use \App\Schemas\EntitySchema;
use \App\Schemas\PricelistSchema;
use \App\Schemas\ProductSchema;
use \App\Schemas\PricelistProductSchema;
use \Neomerx\Limoncello\Config\Config as C;

return [

    /*
    |--------------------------------------------------------------------------
    | Mapping between objects and their schemas
    |--------------------------------------------------------------------------
    |
    | Here you can specify what schemas should be used for object on encoding
    | to JSON API format.
    |
    | Supported schemas: as a class name, as closure.
    |
    */
    C::SCHEMAS => [
        Author::class       => AuthorSchema::class,
        Comment::class      => CommentSchema::class,
        Post::class         => PostSchema::class,
        Site::class         => SiteSchema::class,
        User::class         => UserSchema::class,
        Company::class      => CompanySchema::class,
        Entity::class       => EntitySchema::class,
        Pricelist::class    => PricelistSchema::class,
        Product::class      => ProductSchema::class,
        PricelistProduct::class => PricelistProductSchema::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | JSON encoding options
    |--------------------------------------------------------------------------
    |
    | Here you can specify options to be used while converting data to actual
    | JSON representation with json_encode function.
    |
    | For example if options are set to JSON_PRETTY_PRINT then returned data
    | will be nicely formatted with spaces.
    |
    | see http://php.net/manual/en/function.json-encode.php
    |
    | If this section is omitted default values will be used.
    |
    */
    C::JSON => [
        C::JSON_OPTIONS    => JSON_PRETTY_PRINT,
        C::JSON_DEPTH      => C::JSON_DEPTH_DEFAULT,
    ]

];