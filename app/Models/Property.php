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
        'unit_type',
        'developer',
        'status',
        'bedrooms',
        'bathrooms',
        'square_feet',
        'size_sqm',
        'year_built',
        'completion_date',
        'payment_plan',
        'brochure_url',
        'key_features',
        'featured',
        'is_featured_development',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'bathrooms' => 'decimal:1',
        'size_sqm' => 'decimal:2',
        'featured' => 'boolean',
        'is_featured_development' => 'boolean',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function primaryImage()
    {
        return $this->images()->first();
    }
}
