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
        Schema::create('shift_entries', function (Blueprint $table) {
            $table->id();
            $table->string('shift_name');
            $table->string('shift_group');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('shift_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_entries');
    }
};
