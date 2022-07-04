<?php

namespace App\Services;

use App\Http\Resources\PersonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Models\Person;

class PersonService
{
    /**
     * @param Person $family
     * @return PersonResource
     */
    public function setSingle(Person $family): PersonResource
    {
        return new PersonResource($family);
    }

    /**
     * @param EloquentCollection $people
     * @return JsonResource
     */
    public function setPlural(EloquentCollection $people): JsonResource
    {
        return PersonResource::collection($people);
    }
}
