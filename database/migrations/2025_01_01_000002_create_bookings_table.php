<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->dateTime('pickup_at');
            $table->dateTime('return_at');
            $table->enum('status', ['pending','confirmed','cancelled','completed'])->default('pending');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('bookings');
    }
};
