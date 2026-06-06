<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('property_type')->change();
            $table->string('unit_type')->after('property_type');
            $table->string('developer')->after('unit_type');
            $table->decimal('size_sqm', 8, 2)->nullable()->after('square_feet');
            $table->string('completion_date')->nullable()->after('year_built');
            $table->text('payment_plan')->nullable()->after('completion_date');
            $table->string('brochure_url')->nullable()->after('payment_plan');
            $table->text('key_features')->nullable()->after('brochure_url');
            $table->boolean('is_featured_development')->default(false)->after('featured');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->enum('property_type', ['house', 'apartment', 'condo', 'land'])->change();
            $table->dropColumn([
                'unit_type', 'developer', 'size_sqm',
                'completion_date', 'payment_plan', 'brochure_url',
                'key_features', 'is_featured_development',
            ]);
        });
    }
};
