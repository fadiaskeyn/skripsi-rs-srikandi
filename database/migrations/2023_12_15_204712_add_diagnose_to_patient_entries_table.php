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
        Schema::table('patient_entries', function (Blueprint $table) {
            $table->bigInteger('diagnose_id')->unsigned()->nullable()->after('room_id');
            $table->foreign('diagnose_id')->references('id')->on('diagnoses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_entries', function (Blueprint $table) {
            $table->dropForeign('patient_entries_diagnose_id_foreign');
            $table->dropColumn('diagnose_id');
        });
    }
};
