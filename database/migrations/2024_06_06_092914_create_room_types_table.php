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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('images')->nullable();
            $table->string('room_size')->nullable();
            $table->string('bathroom_facilities')->nullable();
            $table->string('bathroom_count')->nullable();
            $table->string('washroom_count')->nullable();
            $table->string('kitchen_count')->nullable();
            $table->string('kitchen_facilities')->nullable();
            $table->text('disription')->nullable();
            $table->integer('property_type')->nullable();
            $table->string('room_facilities')->nullable();
            $table->string('view_facilities')->nullable();
            $table->integer('smoking')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
