<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->date('born')->nullable();
            $table->text('address')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('total_project')->default(0);
            $table->string('work')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
