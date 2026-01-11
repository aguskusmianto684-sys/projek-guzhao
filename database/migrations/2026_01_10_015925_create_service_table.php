<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service', function (Blueprint $table) {
            $table->bigIncrements('id');   // id bigint auto increment
            $table->text('icon');         // icon (text)
            $table->string('job', 255);   // job varchar(255)
            $table->timestamps();        // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
