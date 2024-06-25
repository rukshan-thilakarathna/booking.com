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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_type_id')->nullable();
            $table->integer('property_id')->nullable();
            $table->string('price')->nullable()->default(0);
            $table->integer('point_price')->nullable()->default(0);
            $table->string('adults')->nullable()->default(0);
            $table->string('Children')->nullable()->default(0);
            $table->string('dicecount')->nullable()->default(0);
            $table->string('display_price')->nullable()->default(0);
            $table->text('user_choice')->nullable();
            $table->integer('open_point_or_cash')->nullable()->default(1);
            $table->string('first_payment_price')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
