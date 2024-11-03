<?php

use App\Models\Medical_record;
use App\Models\Patient;
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
        Schema::create('voice_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId(Patient::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Tenant::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Medical_record::class)->onDelete('set null')->nullable();
            $table->string('file_name');
            $table->string('file_path');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voice_records');
    }
};
