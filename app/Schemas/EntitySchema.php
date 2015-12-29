<?php namespace App\Schemas;

use \App\Models\Entity;
use \App\User;
use \Neomerx\JsonApi\Schema\SchemaProvider;

/**
 * @package Neomerx\LimoncelloCollins
 */
class EntitySchema extends SchemaProvider
{
    /**
     * @inheritdoc
     */
    protected $resourceType = 'entities';

    /**
     * @inheritdoc
     */
    protected $selfSubUrl = '/entities/';

    /**
     * @inheritdoc
     */
    public function getId($entity)
    {
        /** @var Comment $comment */
        return $entity->id;
    }

    /**
     * @inheritdoc
     */
    public function getAttributes($entity)
    {
        /** @var Comment $comment */
        return [
            'company_id' => $entity->company_id,
            'author_id' => $entity->author_id,
            'contact_name' => $entity->contact_name,
            'name' => $entity->name,
            'document' => $entity->document,
            'street_name' => $entity->street_name,
            'street_number' => $entity->street_number,
            'aditional_info' => $entity->aditional_info,
            'email' => $entity->email,
            'phone' => $entity->phone,
            'list_id' => $entity->list_id,
            'provider' => $entity->provider,
            'type' => $entity->type,
            'parent_id' => $entity->parent_id,
            'tax_id' => $entity->tax_id,
            'observation' => $entity->observation,
            'pricelist_id' => $entity->pricelist_id,
        ];


    }
}
