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
        Schema::create('patient_moves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('patient_entry_id')->constrained();
            $table->bigInteger('initial_room')->unsigned();
            $table->bigInteger('moving_room')->unsigned();
            $table->bigInteger('initial_payment')->unsigned();
            $table->bigInteger('moving_payment')->unsigned();
            $table->bigInteger('initial_nursing_class')->unsigned();
            $table->bigInteger('moving_nursing_class')->unsigned();
            $table->timestamps();

            $table->foreign('initial_room')->references('id')->on('rooms');
            $table->foreign('moving_room')->references('id')->on('rooms');

            $table->foreign('initial_payment')->references('id')->on('payments');
            $table->foreign('moving_payment')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_moves');
    }
};
