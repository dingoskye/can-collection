<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    public function cans(): BelongsToMany
    {
        return $this->belongsToMany(Can::class, 'cans')->withTimestamps();
    }
}
