<?php

namespace App\Repositories;

use App\Contracts\StudentInterface;
use App\Models\Guardian;
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

    public function getByGuardian(Guardian $guardian): Collection
    {
        return $this->model->where('guardian_id', $guardian->id)->get();
    }

    public function updateGuardian(Guardian $guardian, string $uid): bool
    {
        return $this->model->where('uid', $uid)->update(['guardian_id' => $guardian->id]);
    }

}
