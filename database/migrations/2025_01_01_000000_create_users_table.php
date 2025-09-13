<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();   // Breeze needs this
            $table->string('password');
            $table->rememberToken();                              // Breeze needs this
            $table->string('phone')->nullable();
            $table->string('driver_license_no')->nullable();
            $table->date('license_expiry')->nullable();
            $table->enum('role', ['customer','driver','staff','admin'])->default('customer');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
};
