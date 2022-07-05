<?php

namespace App\Repositories;

use App\Contracts\StudentInterface;
use App\Models\Family;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository implements StudentInterface
{
    /**
     * @param Student $model
     */
    public function __construct(protected Student $model)
    {
    }

    public function getByFamily(Family $family): Collection
    {
        return $this->model->where('family_id', $family->id)->get();
    }

    public function updateFamily(Family $family, string $uid): bool
    {
        return $this->model->where('uid', $uid)->update(['family_id' => $family->id]);
    }

}
