<?php
namespace amedidav6\Http\Controllers\Repositories;
use amedidav6\Models\Tax;
use Illuminate\Http\Request;

class TaxRepo extends BaseRepo {

    public function getModel(){
        return new Tax();
    }

    public function getRules(){
        return [
            'name' => 'required|max:96'
        ];
    }

}