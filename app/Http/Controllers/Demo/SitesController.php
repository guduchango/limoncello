<?php namespace App\Http\Controllers\Demo;

use \App\Models\Site;
use \App\Http\Requests;
use \Symfony\Component\HttpFoundation\Response;
use \App\Http\Controllers\JsonApi\JsonApiController;
use \Illuminate\Contracts\Validation\ValidationException;

/**
 * @package Neomerx\LimoncelloCollins
 */
class SitesController extends JsonApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->checkParametersEmpty();

        return $this->getResponse(Site::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->checkParametersEmpty();

        $attributes = array_get($this->getDocument(), 'data.attributes', []);

        /** @var \Illuminate\Validation\Validator $validator */
        /** @noinspection PhpUndefinedClassInspection */
        $validator = \Validator::make($attributes, ['name' => 'required|min:5']);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $site = new Site($attributes);
        $site->save();

        return $this->getCreatedResponse($site);
    }

    /**
     * Display the specified resource.
     *
     * @param int $idx
     *
     * @return Response
     */
    public function show($idx)
    {
        $this->checkParametersEmpty();

        return $this->getResponse(Site::findOrFail($idx));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $idx
     *
     * @return Response
     */
    public function update($idx)
    {
        $this->checkParametersEmpty();

        $attributes = array_get($this->getDocument(), 'data.attributes', []);

        /** @var \Illuminate\Validation\Validator $validator */
        /** @noinspection PhpUndefinedClassInspection */
        $validator = \Validator::make($attributes, ['name' => 'sometimes|required|min:5']);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $site = Site::findOrFail($idx);
        $site->fill($attributes);
        $site->save();

        return $this->getCodeResponse(Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $idx
     *
     * @return Response
     */
    public function destroy($idx)
    {
        $this->checkParametersEmpty();

        $site = Site::findOrFail($idx);
        $site->delete();

        return $this->getCodeResponse(Response::HTTP_NO_CONTENT);
    }
}
