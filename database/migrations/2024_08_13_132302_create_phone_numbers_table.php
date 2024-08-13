<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phone_numbers', function (Blueprint $table) {
            $table->id('phone_number_id');
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('submitted_date')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('order_success')->nullable();
            $table->string('order_cancel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_numbers');
    }
};
