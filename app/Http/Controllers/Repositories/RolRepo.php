<?php
namespace amedidav6\Http\Controllers\Repositories;
use amedidav6\Models\Rol;
use Illuminate\Http\Request;

class RolRepo extends BaseRepo {

    public function getModel(){
        return new Rol();
    }

    public function getRules(){
        return [
            'name' => 'required|max:96',
            'company_id' => 'required|integer'
        ];
    }

}