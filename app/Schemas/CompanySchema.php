<?php namespace App\Schemas;

use \App\Models\Company;
use \App\User;
use \Neomerx\JsonApi\Schema\SchemaProvider;

/**
 * @package Neomerx\LimoncelloCollins
 */
class CompanySchema extends SchemaProvider
{
    /**
     * @inheritdoc
     */
    protected $resourceType = 'companies';

    /**
     * @inheritdoc
     */
    protected $selfSubUrl = '/companies/';

    /**
     * @inheritdoc
     */
    public function getId($company)
    {
        /** @var Comment $comment */
        return $company->id;
    }

    /**
     * @inheritdoc
     */
    public function getAttributes($company)
    {
        /** @var Comment $comment */
        return [
            'name' => $company->name,
            'abbreviation' => $company->abbreviation,
            'description' => $company->description,
            'logo_extension' => $company->logo_extension,
            'street_name' => $company->street_name,
            'street_number' => $company->street_number,
            'phone' => $company->phone
        ];

    }


}
