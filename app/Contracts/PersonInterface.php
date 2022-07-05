<?php

namespace App\Contracts;

use App\Models\Family;
use App\Models\Person;

interface PersonInterface
{
    public function store(array $data): Person;

    public function updateFamily(Family $family, array $data): bool;
}
