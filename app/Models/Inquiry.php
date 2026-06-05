<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    protected $fillable = [
        'property_id',
        'name',
        'phone',
        'email',
        'message',
    ];

    /**
     * Get the property that the inquiry is for.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
