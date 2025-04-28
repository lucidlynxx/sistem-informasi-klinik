<?php

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
        Schema::create('medicalrecords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')
                ->constrained('registrations')
                ->onDelete('cascade');
            $table->foreignId('action_id')
                ->constrained('actions')
                ->onDelete('cascade');
            $table->foreignId('medicine_id')
                ->constrained('medicines')
                ->onDelete('cascade');
            $table->text('diagnosa');
            $table->integer('jumlah_obat');
            $table->string('slug')->unique();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicalrecords');
    }
};
