<?php namespace App\Http\Controllers\Demo;

use \App\Http\Requests;
use \App\Models\Comment;
use \Symfony\Component\HttpFoundation\Response;
use \App\Http\Controllers\JsonApi\JsonApiController;
use \Illuminate\Contracts\Validation\ValidationException;
use App\Http\Controllers\Repositories\CompanyRepo;

/**
 * @package Neomerx\LimoncelloCollins
 */
class CommentsController extends JsonApiController
{

    /*public function __construct(CompanyRepo $companyRepo){
        $this->companyRepo = $companyRepo;
    }*/

    protected $allowedFilteringParameters = ['ids'];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*
         *  Parameters are passed just for illustration purposes.
         *  Please note you have to declare allowed parameters in $allowedFilteringParameters field.
         */
        $idxs = $this->getParameters()->getFilteringParameters()['ids'];
        $idxs ?: null; // avoid 'unused' warning

        return $this->getResponse(Comment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->checkParametersEmpty();

        $content = $this->getDocument();

        $attributes            = array_get($content, 'data.attributes', []);
        $attributes['post_id'] = array_get($content, 'data.relationships.post.data.id', null);

        /** @var \Illuminate\Validation\Validator $validator */
        $rules     = ['body' => 'required', 'post_id' => 'required|integer'];
        /** @noinspection PhpUndefinedClassInspection */
        $validator = \Validator::make($attributes, $rules);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $comment = new Comment($attributes);
        $comment->save();

        return $this->getCreatedResponse($comment);
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

        return $this->getResponse(Comment::findOrFail($idx));
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

        $content = $this->getDocument();

        $attributes = array_get($content, 'data.attributes', []);
        $postId     = array_get($content, 'data.relationships.post.data.id', null);
        if ($postId !== null) {
            $attributes['post_id'] = $postId;
        }

        /** @var \Illuminate\Validation\Validator $validator */
        $rules     = ['post_id' => 'sometimes|required|integer'];
        /** @noinspection PhpUndefinedClassInspection */
        $validator = \Validator::make($attributes, $rules);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $comment = Comment::findOrFail($idx);
        $comment->fill($attributes);
        $comment->save();

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

        $comment = Comment::findOrFail($idx);
        $comment->delete();

        return $this->getCodeResponse(Response::HTTP_NO_CONTENT);
    }
}
