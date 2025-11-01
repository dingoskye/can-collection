<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Can extends Model
{
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'can_user');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
