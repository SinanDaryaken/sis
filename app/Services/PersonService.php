<?php

namespace App\Services;

use App\Http\Resources\PersonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Models\Person;

class PersonService
{
    /**
     * @param Person $guardian
     * @return PersonResource
     */
    public function setSingle(Person $guardian): PersonResource
    {
        return new PersonResource($guardian);
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
