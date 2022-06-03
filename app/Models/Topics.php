<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Topics
 *
 * @mixin Builder
 */
class Topics extends Model
{
    use HasFactory;

    protected $primaryKey = "topic_id";

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_id');
    }
    public function modifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_id');
    }
    public function forum(): BelongsTo
    {
        return $this->belongsTo(Forums::class, 'forum_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class, 'post_id');
    }
}
