<?php

namespace App\Http\Controllers\Demo;
use \App\Http\Requests;
use \Symfony\Component\HttpFoundation\Response;
use \App\Http\Controllers\JsonApi\JsonApiController;
use \Illuminate\Contracts\Validation\ValidationException;
use \App\Http\Controllers\Repositories\ProductRepo;
use \App\Models\Product;
use \App\Models\PricelistProduct;

class ProductsController extends JsonApiController
{
    protected $allowedFilteringParameters = ['ids'];

    protected $repository;

    public function __construct(ProductRepo $repository){
        $this->repository = $repository;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $idxs = $this->getParameters()->getFilteringParameters()['ids'];
        $idxs ?: null; // avoid 'unused' warning

        /*echo "<pre>";
        print_r(Product::with('pricelists')->get());
        echo "</pre>";
        exit();*/

        return $this->getResponse(Product::with('pricelists')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){

        $this->checkParametersEmpty();

        $content = $this->getDocument();

        $attributes            = array_get($content, 'data.attributes', []);

        return $this->getCreatedResponse($this->repository->save($attributes));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idx){

        $this->checkParametersEmpty();

        return $this->getResponse($this->repository->find($idx));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idx){

        $this->checkParametersEmpty();
        $content = $this->getDocument();
        $attributes = array_get($content, 'data.attributes', []);

        $this->repository->update($attributes,$idx);

        return $this->getCodeResponse(Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idx){
        $this->checkParametersEmpty();
        $this->repository->destroy($idx);

        return $this->getCodeResponse(Response::HTTP_NO_CONTENT);
    }


}
