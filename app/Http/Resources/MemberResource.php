<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'lastname'          => $this->lastname,
            'firstname'         => $this->firstname,
            'user'      => [
                'id'    => $this->user->id,
                'email' => $this->user->email,
            ],
            'address'           => $this->address,
            'fatherPhone'       => $this->fatherPhone,
            'fatherEmail'       => $this->fatherEmail,
            'motherPhone'       => $this->motherPhone,
            'motherEmail'       => $this->motherEmail,
            'athletePhone'      => $this->athletePhone,
            'athleteEmail'      => $this->athleteEmail,
            'birthday'          => $this->birthday,
            'height'            => $this->height,
            'weight'            => $this->weight,
            'level'             => $this->level,
            'novice'            => $this->novice,
            'previousInstructor'=> $this->previousInstructor,
            'diseases'          => $this->diseases,
            'surgicalHistory'   => $this->surgicalHistory,
            'currentTreatment'  => $this->currentTreatment,
            'allergy'           => $this->allergy,
            'others'            => $this->others,
            'type'              => $this->type,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
