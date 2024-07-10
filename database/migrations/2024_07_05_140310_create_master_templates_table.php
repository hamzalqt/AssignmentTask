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
        Schema::create('master_templates', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('size');
            $table->string('serial');
            $table->string('method');
            // $table->integer('headquarter_id')->nullable();
            $table->integer('master')->default(0);
            $table->integer('changed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_templates');
    }
};