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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('role')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile_number')->nullable();
            $table->string('br_image')->nullable();
            $table->string('nic_or_passport_front_image')->nullable();
            $table->string('nic_or_passport_back_image')->nullable();
            $table->string('profile_verified')->default(0);
            $table->unsignedBigInteger('main_location')->nullable();
            $table->unsignedBigInteger('sub_location')->nullable();
            $table->string('address')->nullable();
            $table->string('nic_or_passport_number')->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
