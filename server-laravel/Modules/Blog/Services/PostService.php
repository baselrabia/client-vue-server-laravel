<?php

namespace Modules\Blog\Services;

use Modules\Blog\Http\Requests\Posts\{CreatePostRequest, UpdatePostRequest};
use Modules\Blog\Http\Resources\Posts\{ListPostsResource, ViewPostResource};

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Blog\Entities\Post;
use Modules\TeamManagement\Entities\AdminType;
use Modules\Blog\Repositories\PostRepository;

class PostService
{
    /**
     * @var PostRepository
     */
    protected PostRepository $postRepository;


    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * 
     * @return AnonymousResourceCollection
     */
    public function list(): AnonymousResourceCollection
    {
        return ListPostsResource::collection(
            $this->postRepository->all('desc')
        );
    }


    /**
     * @param CreatePostRequest $request
     * @return JsonResponse
     */
    public function createPost($data)
    {
        try {
             return $post = $this->postRepository->create($data);
            // return SuccessResponse( new ViewPostResource($post), "Post created successfully", 201);

        } catch (Exception $e) {
             return ErrorResponse([], $e->getMessage(), 400);
        }
    }

    /**
     * @param Post $post
     * @return ViewPostResource|JsonResponse
     */
    public function getPost(Post $post)
    {
        try { 
            return new ViewPostResource($post);
        } catch (Exception $e) {
            return ErrorResponse([], $e->getMessage(), 400);
        }
    }



    /**
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return JsonResponse
     */
    public function updatePost($data, Post $post): JsonResponse
    {
        try {
            $post->update($data);

            if (!$post)throw new Exception( "Something went wrong", 400);

            return SuccessResponse(new ViewPostResource($post), "Post updated successfully", 201);
        } catch (Exception $e) {
            return ErrorResponse([], $e->getMessage(), 400);
        }
    }



    /**
     * @param Post $post
     * @return JsonResponse
     */
    public function deletePost(Post $post)
    {
        try {
            $post->delete();

            return SuccessResponse([], "Post deleted successfully", 201); 
        } catch (Exception $e) {
            return ErrorResponse([], $e->getMessage(), 400);
        }
    }
}
