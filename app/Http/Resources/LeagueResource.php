<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeagueResource extends JsonResource
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
            'name'              => $this->name,
            'user'      => [
                'id'    => $this->user->id,
                'email' => $this->user->email,
            ],
            'foundedOn'         => $this->foundedOn,
            'status'            => $this->status,
            'receipt'           => $this->receipt,
            'registrationNumber'=> $this->registrationNumber,
            'headOffice'        => $this->headOffice,
            'phone'             => $this->phone,
            'address'           => $this->address,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
