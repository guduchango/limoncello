<?php
namespace App\Http\Controllers\Repositories;
use App\Models\Entity;
use Illuminate\Http\Request;


class EntityRepo extends BaseRepo {

    public function getModel(){
        return new Entity();
    }

    public function getRules(){
        return [
            'company_id' => 'required|integer',
            'name' => 'required|max:96|',
            'contact_name' => 'required|max:96',
            'document' => 'required|integer',
            'street_name' => 'max:96',
            'street_number' => 'integer',
            'email' => 'email',
            'phone' => 'integer',
            'pricelist_id' => 'required|integer',
            'provider' => 'max:96',
            'type' => 'in:client,supplier,employee,creditor,subdist',
            'tax_id' => 'required|integer',
        ];
    }


}