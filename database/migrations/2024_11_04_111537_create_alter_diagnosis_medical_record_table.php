<?php

use App\Models\Diagnosis;
use App\Models\Medical_record;
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
        Schema::create('alter_diagnosis_medical_record', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Medical_record::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Diagnosis::class)->onDelete('set null')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alter_diagnosis_medical_record');
    }
};