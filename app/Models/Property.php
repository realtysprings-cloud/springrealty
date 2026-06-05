<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'address',
        'city',
        'state',
        'zip_code',
        'property_type',
        'status',
        'bedrooms',
        'bathrooms',
        'square_feet',
        'year_built',
        'featured',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'bathrooms' => 'decimal:1',
        'featured' => 'boolean',
    ];

    /**
     * Get the images for the property.
     */
    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class);
    }

    /**
     * Get the inquiries for the property.
     */
    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    /**
     * Get the primary/first image for the property.
     */
    public function primaryImage()
    {
        return $this->images()->first();
    }
}
