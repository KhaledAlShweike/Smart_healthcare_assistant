<?php

use App\Models\Symptoms;
use App\Models\Tenant;
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
        Schema::create('medical_record_symptoms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Symptoms::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Tenant::class)->onDelete('set null')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_record_symptoms');
    }
};
