<?php

use App\Models\Tenant;
use App\Models\Treatment_option;
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
        Schema::create('medical_record_treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Treatment_option::class)->onDelete('set null')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_record_treatments');
    }
};
