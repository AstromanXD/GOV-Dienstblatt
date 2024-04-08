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
        Schema::create('house_sells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house');
            $table->unsignedBigInteger('previous_sell')->nullable();
            $table->integer('buyer');
            $table->integer('price');
            $table->string('additional');

            $table->primary(['id','house']);
            $table->foreign('house')->references('id')->on('houses');
            $table->foreign('buyer')->references('social_number')->on('residents');
            $table->foreign('previous_sell')->references('id')->on('house_sells');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_sells');
    }
};
