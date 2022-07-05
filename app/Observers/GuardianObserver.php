<?php

namespace App\Observers;

use App\Models\Guardian;
use App\Notifications\GuardianRegistrationNotification;

class GuardianObserver
{
    /**
     * Handle the IncomeTransaction "created" event.
     *
     * @param Guardian $guardian
     * @return void
     */
    public function created(Guardian $guardian)
    {
        $guardian->notify(new GuardianRegistrationNotification());
    }
}
