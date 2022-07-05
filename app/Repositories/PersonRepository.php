<?php

namespace App\Repositories;

use App\Contracts\PersonInterface;
use App\Models\Family;
use App\Models\Person;

class PersonRepository implements PersonInterface
{
    /**
     * @param Person $model
     */
    public function __construct(protected Person $model)
    {
    }

    public function store(array $data): Person
    {
        return $this->model->create($data);
    }

    public function updateFamily(Family $family, array $data): bool
    {
        return $this->model->where('id', $family->person_id)->update($data);
    }
}
