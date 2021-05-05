<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Game extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'image'       => asset($this->image),
            'description' => $this->description,
            'editor'      => $this->user->fullname,
            'category'    => $this->category->name,
            'slider'      => $this->slider,
            'price'       => $this->price,
            'created_at'  => $this->created_at->format('d/m/Y')
        ];
    }
}
