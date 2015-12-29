<?php namespace App\Schemas;

use \App\Models\PricelistProduct;
use \App\Models\Product;
use \App\Models\Pricelist;
use \App\User;
use \Neomerx\JsonApi\Schema\SchemaProvider;

/**
 * @package Neomerx\LimoncelloCollins
 */
class PricelistProductSchema extends SchemaProvider
{
    protected $resourceType = 'pricelist_product';
    protected $selfSubUrl = '/pricelist_product/';

    public function getId($pricelist_product)
    {
        /** @var Comment $comment */
        return $pricelist_product->id;
    }

    public function getAttributes($pricelist_product)
    {
        /** @var Comment $comment */
        return [
            'product_id' => $pricelist_product->product_id,
            'pricelist_id' => $pricelist_product->pricelist_id,
            'price' => $pricelist_product->price,
            'currency_id' => $pricelist_product->currency_id,
            'percent_subdist' => $pricelist_product->percent_subdist,
            'percent_prevent' => $pricelist_product->percent_prevent,
        ];

    }

    public function getRelationships($pricelist_product, array $includeRelationships = [])
    {
        /** @var Author $author */
        return [
            'product' => [self::DATA => $pricelist_product->product->all()],
            'pricelist' => [self::DATA => $pricelist_product->pricelist->all()],

        ];
    }

    /**
     * @inheritdoc
     */
    /*public function getIncludePaths()
    {
        //return [
          //  'product',
           // 'pricelist'
        //];
    }*/

}
