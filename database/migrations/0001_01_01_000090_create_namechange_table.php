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
        Schema::create('namechange', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('person');
            $table->unsignedbigInteger('previous_namechange')->nullable();
            $table->string('new_name');
            $table->string('new_last_name');
            $table->string('reason');
            $table->string('status');
            $table->foreign('person')->references('social_number')->on('residents');
            $table->foreign('previous_namechange')->references('id')->on('namechange');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('namechange');
    }
};
