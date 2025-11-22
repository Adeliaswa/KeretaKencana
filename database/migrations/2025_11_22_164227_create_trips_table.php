<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            
            //Kunci Relasi 1: Penumpang (User)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            
            //Kunci Relasi 2: Driver (Bisa NULL karena driver dicari setelah trip dibuat)
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->onDelete('set null'); 
            
            $table->string('pickup_location');
            $table->string('destination_location');
            
            //Kolom Logic
            $table->integer('estimated_distance')->nullable(); 
            $table->bigInteger('total_cost')->nullable();
            
            //Status Trip (Wajib)
            $table->enum('status', ['pending', 'searching', 'on_trip', 'completed', 'canceled'])->default('pending');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};