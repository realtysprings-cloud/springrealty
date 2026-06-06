<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            // Core
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 14, 2);
            $table->string('status')->default('for_sale');

            // Location
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();

            // Property classification
            $table->string('property_type')->nullable(); // development name: "Jabali Towers", "Porini Point"
            $table->string('unit_type')->nullable();     // studio, 1-bedroom, 2-bedroom, etc.
            $table->string('developer')->nullable();     // "Rendeavour", "Unity Homes", "NEXT"

            // Specs
            $table->integer('bedrooms')->nullable();
            $table->decimal('bathrooms', 3, 1)->nullable();
            $table->integer('square_feet')->nullable();
            $table->decimal('size_sqm', 8, 2)->nullable();

            // Real estate details
            $table->string('completion_date')->nullable(); // "Q4 2028", "2026"
            $table->text('payment_plan')->nullable();      // "10% deposit, 36-month plan"
            $table->string('brochure_url')->nullable();    // link to PDF brochure
            $table->text('key_features')->nullable();      // JSON or comma-separated features
            $table->integer('year_built')->nullable();

            // Flags
            $table->boolean('featured')->default(false);
            $table->boolean('is_featured_development')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
