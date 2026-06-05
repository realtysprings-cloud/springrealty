<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'title' => 'Modern 3 Bedroom House in Nairobi',
                'description' => 'Beautiful modern house with spacious rooms, great lighting, and a lovely garden. Perfect for families.',
                'price' => 12000000,
                'address' => 'Kilimani Road',
                'city' => 'Nairobi',
                'state' => 'Nairobi County',
                'zip_code' => '00100',
                'property_type' => 'house',
                'status' => 'for_sale',
                'bedrooms' => 3,
                'bathrooms' => 2.5,
                'square_feet' => 2500,
                'year_built' => 2020,
                'featured' => true,
            ],
            [
                'title' => 'Luxury Apartment in Westlands',
                'description' => 'Stunning 2-bedroom apartment with modern finishes, gym, and swimming pool. Prime location.',
                'price' => 8500000,
                'address' => 'Westlands Avenue',
                'city' => 'Nairobi',
                'state' => 'Nairobi County',
                'zip_code' => '00100',
                'property_type' => 'apartment',
                'status' => 'for_sale',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'square_feet' => 1800,
                'year_built' => 2021,
                'featured' => true,
            ],
            [
                'title' => 'Prime Land in Kiambu',
                'description' => '1-acre plot with clean title deed. Ideal for residential development or investment.',
                'price' => 5000000,
                'address' => 'Kiambu Road',
                'city' => 'Kiambu',
                'state' => 'Kiambu County',
                'zip_code' => '00900',
                'property_type' => 'land',
                'status' => 'for_sale',
                'bedrooms' => null,
                'bathrooms' => null,
                'square_feet' => 43560,
                'year_built' => null,
                'featured' => true,
            ],
            [
                'title' => 'Cozy 2 Bedroom Apartment for Rent',
                'description' => 'Affordable and comfortable apartment in a quiet neighborhood. Close to shops and schools.',
                'price' => 45000,
                'address' => 'Ngong Road',
                'city' => 'Nairobi',
                'state' => 'Nairobi County',
                'zip_code' => '00100',
                'property_type' => 'apartment',
                'status' => 'for_rent',
                'bedrooms' => 2,
                'bathrooms' => 1,
                'square_feet' => 1200,
                'year_built' => 2018,
                'featured' => false,
            ],
            [
                'title' => 'Spacious 4 Bedroom Condo',
                'description' => 'Family-friendly condo with beautiful views, balcony, and secure parking.',
                'price' => 15000000,
                'address' => 'Karen Road',
                'city' => 'Nairobi',
                'state' => 'Nairobi County',
                'zip_code' => '00100',
                'property_type' => 'condo',
                'status' => 'for_sale',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'square_feet' => 3200,
                'year_built' => 2022,
                'featured' => true,
            ],
            [
                'title' => 'Commercial Land in Thika',
                'description' => 'Half-acre commercial plot along busy highway. Great for business ventures.',
                'price' => 7500000,
                'address' => 'Thika Superhighway',
                'city' => 'Thika',
                'state' => 'Kiambu County',
                'zip_code' => '01000',
                'property_type' => 'land',
                'status' => 'for_sale',
                'bedrooms' => null,
                'bathrooms' => null,
                'square_feet' => 21780,
                'year_built' => null,
                'featured' => true,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
