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
        Schema::create('phonechange', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('person');
            $table->integer('new_number');
            $table->foreign('person')->references('social_number')->on('residents');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phonechange');
    }
};
