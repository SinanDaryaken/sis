<?php

namespace App\Repositories;

use App\Contracts\FamilyInterface;
use App\Models\Family;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;

class FamilyRepository implements FamilyInterface
{
    /**
     * @param Family $model
     */
    public function __construct(protected Family $model)
    {
    }

    public function register(Person $person, array $data): Family
    {
        return $this->model->create([
            'person_id' => $person->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update(Family $family, array $data): bool
    {
        return $family->update($data);
    }
}
