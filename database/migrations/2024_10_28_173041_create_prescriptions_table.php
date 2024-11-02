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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class)->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Medical_record::class)->constrained()->cascadeOnDelete();
            $table->string('instruction');
            $table->string('dosage');
            $table->string('frequency');
            $table->string('duration');
            $table->date('start_date');
            $table->date('end_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
