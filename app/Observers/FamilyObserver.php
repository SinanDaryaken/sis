<?php

namespace App\Observers;

use App\Models\Family;
use App\Notifications\FamilyRegistrationNotification;

class FamilyObserver
{
    /**
     * Handle the IncomeTransaction "created" event.
     *
     * @param Family $family
     * @return void
     */
    public function created(Family $family)
    {
        $family->notify(new FamilyRegistrationNotification());
    }
}
