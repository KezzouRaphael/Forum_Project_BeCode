<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Forums
 *
 * @mixin Builder
 */
class Forums extends Model
{
    use HasFactory;

    protected $primaryKey = "forum_id";
    public function board()
    {
        return $this->belongsTo(Boards::class, 'board_id');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_id');
    }
    public function modifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_id');
    }
}
