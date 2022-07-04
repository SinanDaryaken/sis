<?php

namespace App\Services;

use App\Http\Resources\StudentResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Models\Student;

class StudentService
{
    /**
     * @param Student $family
     * @return StudentResource
     */
    public function setSingle(Student $family): StudentResource
    {
        return new StudentResource($family);
    }

    /**
     * @param EloquentCollection $students
     * @return JsonResource
     */
    public function setPlural(EloquentCollection $students): JsonResource
    {
        return StudentResource::collection($students);
    }
}
