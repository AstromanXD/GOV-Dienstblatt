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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('person1');
            $table->integer('person2');
            $table->string('status');
            $table->string('paket');
            $table->boolean('paid');
            $table->dateTime('wedding_date');
            $table->dateTime('divorce_date');
            $table->foreign('person1')->references('social_number')->on('residents');
            $table->foreign('person2')->references('social_number')->on('residents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
