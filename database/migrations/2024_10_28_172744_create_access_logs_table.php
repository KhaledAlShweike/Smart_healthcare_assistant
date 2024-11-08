<?php

use App\Models\Medical_record;
use App\Models\Role;
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
        Schema::create('access_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Doctor::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Role::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Medical_record::class)->onDelete('set null')->nullable();
            $table->string('action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_logs');
    }
};
