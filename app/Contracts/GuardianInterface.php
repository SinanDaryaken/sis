<?php

namespace App\Contracts;

use App\Models\Guardian;
use App\Models\Person;

interface GuardianInterface
{
    public function register(Person $person, array $data): Guardian;

    public function update(Guardian $guardian, array $data): bool;
}
