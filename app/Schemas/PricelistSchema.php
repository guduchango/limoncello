<?php namespace App\Schemas;

use \App\Models\Pricelist;
use \App\Models\PricelistProduct;
use \App\User;
use \Neomerx\JsonApi\Schema\SchemaProvider;

/**
 * @package Neomerx\LimoncelloCollins
 */
class PricelistSchema extends SchemaProvider
{
    protected $resourceType = 'pricelists';
    protected $selfSubUrl = '/pricelists/';

    public function getId($pricelist)
    {
        /** @var Comment $comment */
        return $pricelist->id;
    }

    public function getAttributes($pricelist)
    {
        /** @var Comment $comment */
        return [
            'name' => $pricelist->name,
            'company_id' => $pricelist->company_id,
            'percent_price' => $pricelist->percent_price,
            'percent_subdist' => $pricelist->percent_subdist,
            'percent_prevent' => $pricelist->percent_prevent
        ];

    }

}
