<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FuelResource extends JsonResource
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
          'fact' => $this->fact,
          'norm' => $this->norm,
          'work' => $this->work,
          'dead' => $this->dead,
          'created_at' => $this->created_at->toDateString(),
        ];
    }
}
