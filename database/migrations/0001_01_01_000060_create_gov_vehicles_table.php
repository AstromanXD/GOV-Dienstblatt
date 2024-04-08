<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gov_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('gov_vehicle_types');
            $table->string('additional');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gov_vehicles');
    }
};
