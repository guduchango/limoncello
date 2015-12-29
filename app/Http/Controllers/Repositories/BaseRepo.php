<?php 

namespace App\Http\Controllers\Repositories;
use Illuminate\Http\Request;
use Validator;
use \Illuminate\Contracts\Validation\ValidationException;
use \Symfony\Component\HttpFoundation\Response;


/**
 * Class BaseRepo
 * @package amedidav6\Http\Repositories
 */
abstract class BaseRepo {

    /**
     * @var
     */
    protected $model;
    /**
     * @var
     */
    protected $rules;

    /**
     *
     */
    public function __construct(){
        $this->model = $this->getModel();
        $this->moodel = $this->getRules();
    }

    //Esto obliga a que la clase hija tenga este atributo siempre (declarar la variable model)
    /**
     * @return mixed
     */
    abstract public function getModel();

    //Esto sirve para crear reglas
    /**
     * @return mixed
     */
    abstract public function getRules();

    /**
     * @param Request $request
     * @return string
     */
    public function save($attributes) {

        /** @noinspection PhpUndefinedClassInspection */
        $validator = \Validator::make($attributes, $this->getRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $obj=$this->model->create($attributes);

        return $obj;
    }

    /**
     * @param Request $request
     * @param $id
     * @return string
     */
    public function update($attributes,$idx){

        /** @noinspection PhpUndefinedClassInspection */
        $validator = \Validator::make($attributes, $this->getRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $comment = $this->model->findOrFail($idx);
        $comment->fill($attributes);
        $comment->save();

        $obj = $this->model->findOrFail($idx);
        $obj->fill($attributes)->save();

        return $obj;
    }

    /**
     * @param $id
     * @return string
     */
    public function destroy($id){
        return  $this->model->destroy($id);
    }

    /**
     * @return string
     */
    public function findAll() {
        $objs = $this->model->all();
        return  $objs;
    }

    /**
     * @param $id
     * @return string
     */
    public function find($id) {
        $obj = $this->model->find($id);

        return $obj;
    }

}