<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->string('provider')->default('stripe');
            $table->string('provider_ref')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending','paid','failed','refunded'])->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('payments');
    }
};
