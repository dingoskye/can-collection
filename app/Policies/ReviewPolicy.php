<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Bepaalt of de gebruiker het recht heeft
     * om een review aan te maken.
     */
    public function unlock(User $user): bool
    {
        return $user->cans()->count() >= 5;
    }
}
