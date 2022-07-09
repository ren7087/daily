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
        return [
            "id" => $this->id,
            "customer" => $this->customer,
            "location" => $this->location,
            "product" => $this->product,
            "start" => $this->start,
            "end" => $this->end,
            "action" => $this->action,
            "transportation" => $this->transportation,
            "fee" => $this->fee,
            "content" => $this->content,
            "comment" => $this->comment,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
