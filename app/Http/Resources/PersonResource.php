<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'person_id' => $this->name,
            'email' => $this->surname,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone ?? 'N\A',
            'family' => $this->family,
            'student' => $this->student
        ];
    }
}
