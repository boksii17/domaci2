<?php

namespace App\Http\Resources;

use App\Models\Fakultet;
use App\Models\Smer;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $smer = Smer::find($this->smerID);
        $fakultet = Fakultet::find($smer->fakultetID);

        return [
            'ID' => $this->id,
            'Ime' => $this->ime,
            'Prezime' => $this->prezime,
            'Broj indeksa' => $this->brojIndeksa,
            'Smer' => $smer->nazivSmera,
            'Fakultet' => $fakultet->nazivFakulteta,
            'Grad' => $fakultet->grad
        ];
    }
}
