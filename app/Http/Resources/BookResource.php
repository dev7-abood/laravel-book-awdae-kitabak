<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'isbn' => $this->isbn,
            'img_url' => $this->img_url,
            'handed_in_at' => $this->handed_in_at->diffForHumans(),
            'created_at' => $this->created_at->diffForHumans(),

//                ->diffForHumans(),
        ];
    }
}
