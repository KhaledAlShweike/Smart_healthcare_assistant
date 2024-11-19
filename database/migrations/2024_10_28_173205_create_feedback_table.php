<?php

use App\Models\Tenant;
use App\Models\Doctor;
use App\Models\Patient;
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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Doctor::class)->onDelete('set null')->nullable();
            $table->foreignIdFor(Patient::class)->onDelete('set null')->nullable();
            $table->string('feedback_content');
            $table->enum('rate',['Bad', 'Good' , 'Excellent']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
