<?php
namespace App\Http\Controllers\Repositories;
use App\Models\PricelistProduct;
use Illuminate\Http\Request;


class PricelistProductRepo extends BaseRepo {

    public function getModel(){
        return new PricelistProduct();
    }

    public function getRules(){

        return [
            'product_id' => 'required|integer',
            'pricelist_id' => 'required|integer',
            'price' => 'required|numeric',
            'currency_id'=> 'required|integer',
            'percent_subdist' => 'numeric'
        ];
    }


}