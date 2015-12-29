<?php
namespace App\Http\Controllers\Repositories;
use App\Models\Pricelist;
use Illuminate\Http\Request;

class PricelistRepo extends BaseRepo {

    public function getModel(){
        return new Pricelist();
    }

    public function getRules(){
        return [
            'name' => 'required|max:96',
            'company_id' => 'required|integer'
        ];
    }

}