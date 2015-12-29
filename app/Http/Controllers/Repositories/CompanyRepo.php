<?php
namespace App\Http\Controllers\Repositories;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyRepo extends BaseRepo {

    public function getModel(){
        return new Company();
    }

    public function getRules(){
        return [
            'user_id' => 'required|integer',
            'name' => 'required|max:96',
            'abbreviation' => 'max:5',
            'description' => '',
            'logo_extension' => 'max:10',
            'street_name' => 'max:96',
            'street_number' => 'integer',
            'phone' => 'integer'
        ];
    }

}