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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('tech_passport_seria');
            $table->string('tech_passport_number');
            $table->string('gov_number');
            $table->date('tech_passport_issue_date')->nullable();
            $table->integer('issue_year')->nullable();
            $table->integer('vehicle_type_id')->nullable();
            $table->string('body_number')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('p_vehicle_id')->nullable();
            $table->string('model_name')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->string('division')->nullable();
            $table->integer('full_weight')->nullable();
            $table->integer('empty_weight')->nullable();
            $table->string('fuel_type')->nullable();
            $table->integer('seats')->nullable();
            $table->integer('stands')->nullable();
            $table->string('comment')->nullable();
            $table->string('inspection')->nullable();
            $table->string('pinfl')->nullable();
            $table->string('owner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
