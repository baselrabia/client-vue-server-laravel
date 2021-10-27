<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Blog\Services\PostService;
use Modules\Blog\Http\Requests\Posts\{CreatePostRequest, UpdatePostRequest};
use Modules\Blog\Http\Resources\Posts\ViewPostResource;

class BlogController extends Controller
{

    /**
     * @var PostService
     */
    protected PostService $postService;

    /**
     * TeamController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }


    /**
     * Display a listing of the resource.
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index()
    {
        return $this->postService->list();
    }



    /**
     * Store a newly created resource in storage.
     * @param CreatePostRequest $request
     * @return ViewPostResource|JsonResponse
     */
    public function store(CreatePostRequest $request)
    {
        return $this->postService->createPost($request->all());
    }

    /**
     * Show the specified resource.
     * @param Post $post
     * @return ViewPostResource|JsonResponse
     */
    public function show(Post $post)
    {
        return $this->postService->getPost($post);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePostRequest $request
     * @param post $post
     * @return ViewPostResource|JsonResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        return $this->postService->updatePost($request->all(), $post);
    }

    /**
     * Remove the specified resource from storage.
     * @param post $post
     * @return JsonResponse
     */
    public function destroy(Post $post)
    {
        return $this->postService->deletePost($post);
    }
}
