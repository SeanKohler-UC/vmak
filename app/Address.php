<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    /**
     * Get owners associated with an address.
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    /**
     * Get cars associated with an address.
     *
     * @return HasMany
     */
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
