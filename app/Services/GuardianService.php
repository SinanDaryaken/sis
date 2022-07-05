<?php

namespace App\Services;

use App\Http\Resources\GuardianResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Models\Guardian;

class GuardianService
{
    /**
     * @param Guardian $guardian
     * @return GuardianResource
     */
    public function setSingle(Guardian $guardian): GuardianResource
    {
        return new GuardianResource($guardian);
    }

    /**
     * @param EloquentCollection $guardians
     * @return JsonResource
     */
    public function setPlural(EloquentCollection $guardians): JsonResource
    {
        return GuardianResource::collection($guardians);
    }
}
