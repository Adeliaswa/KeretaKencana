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
    Schema::create('drivers', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100);
        $table->string('phone', 15)->unique(); // Pastikan nomor telepon unik
        $table->string('license_number', 50)->unique(); // Nomor SIM/Lisensi harus unik
        $table->enum('status', ['available', 'on_trip', 'offline'])->default('available'); // Status pengemudi
        $table->timestamps();
    });
}
};
