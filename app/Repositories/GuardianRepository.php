<?php

namespace App\Repositories;

use App\Contracts\GuardianInterface;
use App\Models\Guardian;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;

class GuardianRepository implements GuardianInterface
{
    /**
     * @param Guardian $model
     */
    public function __construct(protected Guardian $model)
    {
    }

    public function register(Person $person, array $data): Guardian
    {
        return $this->model->create([
            'person_id' => $person->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update(Guardian $guardian, array $data): bool
    {
        return $guardian->update($data);
    }
}
