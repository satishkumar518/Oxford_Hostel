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
        Schema::create('book_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('sid')->unique();
            $table->string('name');
            $table->string('floor');
            $table->integer('duration');
            $table->float('price');
            $table->string('room_no');
            $table->string('bed_no');
            $table->date('start_date');
            $table->date('end_date');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_rooms');
    }
};
