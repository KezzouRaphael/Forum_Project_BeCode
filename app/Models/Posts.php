<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Posts
 *
 * @mixin Builder
 */
class Posts extends Model
{
    use HasFactory;
    protected $primaryKey = "post_id";
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_id');
    }

    public function modifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_id');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topics::class, 'topic_id');
    }
}
