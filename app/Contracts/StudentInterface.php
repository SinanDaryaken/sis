<?php

namespace App\Contracts;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Collection;

interface StudentInterface
{
    public function getByGuardian(Guardian $guardian): Collection;

    public function updateGuardian(Guardian $guardian, string $uid): bool;
}
