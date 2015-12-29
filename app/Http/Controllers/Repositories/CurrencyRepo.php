<?php
namespace amedidav6\Http\Controllers\Repositories;
use amedidav6\Models\Currency;
use Illuminate\Http\Request;

class CurrencyRepo extends BaseRepo {

    public function getModel(){
        return new Currency();
    }

    public function getRules(){
        return [
            'code_iso' => 'required|integer',
            'symbol' => 'max:10',
            'name' => 'required|max:96',
            'cotization_usd' => 'numeric',
            'percent_subdist' => 'numeric',
        ];
    }

}