<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->unique();
            $table->string('make');
            $table->string('model');
            $table->year('year');
            $table->string('type');
            $table->integer('seats');
            $table->enum('transmission', ['auto','manual']);
            $table->decimal('daily_rate', 10, 2);
            $table->enum('status', ['available','booked','maintenance','retired'])->default('available');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('vehicles');
    }
};
