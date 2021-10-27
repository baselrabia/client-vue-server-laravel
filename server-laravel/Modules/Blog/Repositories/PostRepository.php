<?php

namespace  Modules\Blog\Repositories;

use Modules\Blog\Entities\Post;

class PostRepository extends BaseRepository
{
    /**
     * __constructor
     *
     * @param Post $postModel
     */
    public function __construct(Post $postModel)
    {
        parent::__construct($postModel);
    }
  
}
