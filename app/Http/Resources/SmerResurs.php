<?php

namespace App\Http\Resources;

use App\Models\Fakultet;
use Illuminate\Http\Resources\Json\JsonResource;

class SmerResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $fakultet = Fakultet::find($this->fakultetID);

        return [
            'ID' => $this->id,
            'Smer' => $this->nazivSmera,
            'Fakultet' => $fakultet->nazivFakulteta
        ];
    }
}
