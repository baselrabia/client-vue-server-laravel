<?php

namespace Modules\Blog\Http\Resources\Posts;

use Illuminate\Http\Resources\Json\JsonResource;

class ViewPostResource extends JsonResource
{
    public function toArray($request)
    {
 
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,

            'created_at' => $this->created_at ? $this->created_at->format('Y-m-d') : '',
            'updated_at' => $this->updated_at ? $this->updated_at->format('Y-m-d') : '',
         ];
    }
}
