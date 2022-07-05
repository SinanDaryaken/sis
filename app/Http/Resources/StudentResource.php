<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'person_id' => $this->person_id,
            'family_id' => $this->family_id ?? 'N\A',
            'name' => $this->person->name,
            'surname' => $this->person->surname,
            'phone' => $this->person->phone,
            'birth_date' => $this->person->birth_date,
            'student_number' => $this->student_number,
            'uid' => $this->uid,
            'family' => $this->family,
            'person' => $this->person
        ];
    }
}
