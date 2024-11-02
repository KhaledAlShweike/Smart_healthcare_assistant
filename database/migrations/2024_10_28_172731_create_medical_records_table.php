<?php

use App\Models\Patient;
use App\Models\Tenant;
use App\Models\Doctor;
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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Doctor::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Tenant::class)->onDelete('cascade')->onUpdate('cascade');
            $table->string('diagnosis');
            $table->string('symptoms');
            $table->string('treatment');
            $table->date('record_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
