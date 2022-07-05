<?php

namespace App\Contracts;

use App\Models\Guardian;
use App\Models\Person;

interface PersonInterface
{
    public function store(array $data): Person;

    public function updateGuardian(Guardian $guardian, array $data): bool;
}
