<?php namespace App\Schemas;

use \App\Models\Product;
use \App\Models\PricelistProduct;
use \App\User;
use \Neomerx\JsonApi\Schema\SchemaProvider;

/**
 * @package Neomerx\LimoncelloCollins
 */
class ProductSchema extends SchemaProvider
{
    protected $resourceType = 'products';
    protected $selfSubUrl = '/products/';

    public function getId($product)
    {
        /** @var Comment $comment */
        return $product->id;
    }

    public function getAttributes($product)
    {
        /** @var Comment $comment */
        return [
            'author_id' => $product->author_id,
            'company_id' => $product->company_id,
            'name' => $product->name,
            'description' => $product->description,
            'stock' => $product->stock,
            'cost' => $product->cost,
            'duration' => $product->duration,
            'sort' => $product->type,
            'barcode' => $product->barcode,
            'alert_stock' => $product->alert_stock,
            'desired_stock' => $product->desired_stock,
        ];

    }

    public function getRelationships($product, array $includeRelationships = [])
    {

        /** @var Author $author */
        return [
            'pricelists' => [self::DATA => $product->pricelists->all()],
            'prices' => [self::DATA => $product->prices->all()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getIncludePaths()
    {
        return [
            'pricelists',
            //'prices'
        ];
    }

}
