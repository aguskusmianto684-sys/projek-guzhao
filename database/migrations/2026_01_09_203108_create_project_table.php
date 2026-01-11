<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');   
            $table->string('image', 255);
            $table->string('title', 255);
            $table->string('job', 255);
            $table->string('category', 255);
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
