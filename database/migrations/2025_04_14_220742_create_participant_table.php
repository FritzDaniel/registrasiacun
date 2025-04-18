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
        Schema::create('participant', function (Blueprint $table) {
            $table->id();
            $table->string('unique_code')->unique();
            $table->string('company')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('name');
            $table->integer('vip')->default(0);
            $table->text('description')->nullable();
            $table->string('jersey')->nullable();
            $table->integer('no_flight')->nullable();
            $table->string('nominal')->nullable();
            $table->integer('payment_status')->default(0);
            $table->string('status')->nullable();
            $table->integer('invitation')->default(0);
            $table->timestamp('absence_time')->nullable();
            $table->integer('eligible_to_attend')->default(1);
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant');
    }
};
