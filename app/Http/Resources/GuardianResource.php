<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuardianResource extends JsonResource
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
            'email' => $this->email,
            'name' => $this->person->name,
            'surname' => $this->person->surname,
            'birth_date' => $this->person->birth_date,
            'phone' => $this->person->phone,
            'student' => StudentResource::collection($this->students)
        ];
    }
}
