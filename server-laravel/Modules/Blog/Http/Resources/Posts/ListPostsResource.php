<?php

namespace Modules\Blog\Http\Resources\Posts;

use Illuminate\Http\Resources\Json\JsonResource;

class ListPostsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
