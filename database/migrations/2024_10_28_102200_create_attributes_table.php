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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('attributes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('order')->nullable()->index();
            $table->tinyInteger('status')->default(1)->comment('0 : inactive, 1 : active')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};