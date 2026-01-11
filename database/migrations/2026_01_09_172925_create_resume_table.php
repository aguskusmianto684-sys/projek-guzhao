<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date', 255);
            $table->string('job', 255);
            $table->string('place', 255);
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resume');
    }
};
