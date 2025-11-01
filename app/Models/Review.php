<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'can_id',
        'rating_taste',
        'rating_design',
        'comment',
    ];

    public function can(): BelongsTo
    {
        return $this->belongsTo(Can::class);
    }

    public function user(): User|BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
