<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BureauResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'        => $this->id,
            'startDate' => $this->startDate,
            'endDate'   => $this->endDate,
            'club'      => $this->club?->id,
            'league'    => $this->league?->id,
            'federation'=> $this->federation?->id,
            'president' => $this->president ? $this->president->firstname.' '.$this->president->lastname : null,
            'secretary' => $this->secretary ? $this->secretary->firstname.' '.$this->secretary->lastname : null,
            'treasurer' => $this->treasurer ? $this->treasurer->firstname.' '.$this->treasurer->lastname : null,
            'vicePresident1' => $this->vicePresident1?->firstname,
            'vicePresident2' => $this->vicePresident2?->firstname,
            'deputySecretary'=> $this->deputySecretary?->firstname,
            'deputyTreasurer'=> $this->deputyTreasurer?->firstname,
            'boardMember1'   => $this->boardMember1?->firstname,
            'boardMember2'   => $this->boardMember2?->firstname,
        ];
    }
}
