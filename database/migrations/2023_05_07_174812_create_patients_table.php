<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('primary_phone_number');
            $table->string('secondary_phone_number')->nullable();

            $table->enum('gender', [
                'male',
                'female',
                'other'
            ]);
            $table->date('birthdate');
            $table->string('ethnicity');
            $table->string('occupation');

            $table->unsignedBigInteger('governorate_id');
            $table->foreign('governorate_id')->references('id')
                ->on('governorates')
                ->restrictOnDelete();

            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')
                ->on('districts')
                ->restrictOnDelete();

            $table->unsignedBigInteger('sub_district_id');
            $table->foreign('sub_district_id')->references('id')
                ->on('sub_districts')
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
