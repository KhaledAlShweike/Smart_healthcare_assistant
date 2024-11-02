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
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('status');
            $table->date('date');
            $table->enum('outcome', ['Failed', 'Succeded']);
            $table->foreignIdFor(Patient::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Tenant::class)->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Medical_record::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures');
    }
};
