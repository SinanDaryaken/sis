<?php

namespace App\Services;

use App\Http\Resources\FamilyResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Models\Family;

class FamilyService
{
    /**
     * @param Family $family
     * @return FamilyResource
     */
    public function setSingle(Family $family): FamilyResource
    {
        return new FamilyResource($family);
    }

    /**
     * @param EloquentCollection $families
     * @return JsonResource
     */
    public function setPlural(EloquentCollection $families): JsonResource
    {
        return FamilyResource::collection($families);
    }
}
