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
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');

            $table->date('subscription')->default(today()->startOfMonth());

            $table->unsignedBigInteger('entity_id');
            $table->foreign('entity_id')
                ->references('id')
                ->on('entities')
                ->restrictOnDelete();

            $table->unsignedBigInteger('patient_visit_form_id')
            ->nullable();
            $table->foreign('patient_visit_form_id')
                ->references('id')
                ->on('forms')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
