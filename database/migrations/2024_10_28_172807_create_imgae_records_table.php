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
        Schema::create('imgae_records', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');
            $table->string('image_name');
            $table->string('image_description');
            $table->string('image_type');
            $table->foreignIdFor(Tenant::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Patient::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Medical_record::class)->onDelete('set null')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imgae_records');
    }
};
