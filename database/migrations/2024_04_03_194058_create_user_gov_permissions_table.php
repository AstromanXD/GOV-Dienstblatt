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
        Schema::create('user_gov_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('admin');
            $table->boolean('auctions');
            $table->boolean('houses');
            $table->boolean('namechange');
            $table->boolean('leader');
            $table->boolean('economy');
            $table->boolean('justice');
            $table->boolean('state');
            $table->boolean('secret_service');
            $table->boolean('car_maintenance');
            $table->boolean('registry_office');
            $table->boolean('disabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
