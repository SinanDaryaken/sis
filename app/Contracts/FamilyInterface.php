<?php

namespace App\Contracts;

use App\Models\Family;
use App\Models\Person;

interface FamilyInterface
{
    public function register(Person $person, array $data): Family;

    public function update(Family $family, array $data): bool;
}
