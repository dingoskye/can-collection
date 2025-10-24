<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Can extends Model
{
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'can_user')->withTimestamps();
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brands')->withTimestamps();
    }
}
