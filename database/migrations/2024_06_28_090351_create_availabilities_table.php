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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->integer('room_number');
            $table->integer('adults');
            $table->integer('children');
            $table->integer('1')->default(0);
            $table->integer('2')->default(0);
            $table->integer('3')->default(0);
            $table->integer('4')->default(0);
            $table->integer('5')->default(0);
            $table->integer('6')->default(0);
            $table->integer('7')->default(0);
            $table->integer('8')->default(0);
            $table->integer('9')->default(0);
            $table->integer('10')->default(0);
            $table->integer('11')->default(0);
            $table->integer('12')->default(0);
            $table->integer('13')->default(0);
            $table->integer('14')->default(0);
            $table->integer('15')->default(0);
            $table->integer('16')->default(0);
            $table->integer('17')->default(0);
            $table->integer('18')->default(0);
            $table->integer('19')->default(0);
            $table->integer('20')->default(0);
            $table->integer('21')->default(0);
            $table->integer('22')->default(0);
            $table->integer('23')->default(0);
            $table->integer('24')->default(0);
            $table->integer('25')->default(0);
            $table->integer('26')->default(0);
            $table->integer('27')->default(0);
            $table->integer('28')->default(0);
            $table->integer('29')->default(0);
            $table->integer('30')->default(0);
            $table->integer('31')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
