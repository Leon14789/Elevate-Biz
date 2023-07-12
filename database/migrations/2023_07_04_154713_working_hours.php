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
        Schema::create('hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->length(6);
            $table->string('work_date');
            $table->datetime('time1')->nullable();
            $table->datetime('time2')->nullable();
            $table->datetime('time3')->nullable();
            $table->datetime('time4')->nullable();
            $table->string('worked_time')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->unique(['user_id', 'work_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hours');
    }
};
