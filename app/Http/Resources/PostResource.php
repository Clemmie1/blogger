<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $html = $request->query('html_content');

        return [
            'post_id' => $this->id,
            'channel_id' => $this->channle_id,

            'private' => $this->when($this->private == true, function (){
                return true;
            }, function (){
                return false;
            }),

            'category' => $this->category,
            'created_at' => $this->created_at->format('d.m.Y H:i'),
            'updated_at' => $this->updated_at->format('d.m.Y H:i'),
            'likes' => [
                'total_views' => $this->total_views,
                'total_likes' => $this->total_likes,
                'total_comments' => $this->total_comments,
            ],
            'content' => [
                'img' => $this->banner_img,
                'title' => $this->title,
                'content' => ($html == 'true' ? $this->content : strip_tags($this->content)),
            ]
        ];
    }
}
