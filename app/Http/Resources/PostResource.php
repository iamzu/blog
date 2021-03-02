<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $storage = Storage::disk(config('admin.upload.disk'));
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $storage->url($this->page_image),
            'content' => $this->content_raw,
            'author' => config('blog.author'),
            'posted_at' => $this->ui_created_at,
            'views' => random_int(1, 100000),
            'votes' => random_int(1, 1000)
        ];
    }
}
