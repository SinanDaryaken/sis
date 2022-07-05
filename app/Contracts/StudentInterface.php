<?php

namespace App\Contracts;

use App\Models\Family;
use Illuminate\Database\Eloquent\Collection;

interface StudentInterface
{
    public function getByFamily(Family $family): Collection;

    public function updateFamily(Family $family, string $uid): bool;
}
