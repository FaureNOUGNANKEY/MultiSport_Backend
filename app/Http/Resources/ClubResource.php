<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->id,
            'user'      => [
                'id'    => $this->user->id,
                'email' => $this->user->email,
            ],
            'receipt'            => $this->receipt,
            'registrationNumber' => $this->registrationNumber,
            'headOffice'         => $this->headOffice,
            'founderLastname'    => $this->founderLastname,
            'founderFirstname'   => $this->founderFirstname,
            'foundedOn'          => $this->foundedOn,
            'status'             => $this->status,
            'phone'              => $this->phone,
            'address'            => $this->address,
            'created_at'         => $this->created_at,
            'updated_at'         => $this->updated_at,
        ];
    }
}
