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
        Schema::create('gov_security', function (Blueprint $table) {
            $table->id();
            $table->integer('defcon');
            $table->integer('security');
            $table->integer('weapon_pakets');
            $table->timestamp('pakets_last_edited');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gov_security');
    }
};
