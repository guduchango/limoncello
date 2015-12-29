<?php
namespace App\Http\Controllers\Repositories;
use App\Models\Product;
use App\Models\PricelistProduct;
use Illuminate\Http\Request;

class ProductRepo extends BaseRepo {

    public function getModel(){
        return new Product();
    }

    public function getRules(){
        return [
            'author_id' => 'required|integer',
            'company_id' => 'required|integer',
            'name' => 'required|max:96',
            'description' => '',
            'stock' => 'integer',
            'cost' => 'numeric',
            'duration' => 'integer',
            'sort' => 'max:96',
            'barcode' => 'max:96',
            'alert_stock' => 'integer',
            'desired_stock' => 'integer'
        ];
    }

}