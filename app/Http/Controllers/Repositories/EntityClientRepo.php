<?php
namespace amedidav6\Http\Controllers\Repositories;
use amedidav6\Models\EntityClient;
use Illuminate\Http\Request;

class EntityClientRepo extends BaseRepo {

    public function getModel(){
        return new EntityClient();
    }

    public function getRules(){
        return [
            'entity_id' => 'required|integer',
            'pricelist_id' => 'required|integer',
            'credit_limit' => 'integer'
        ];
    }

}