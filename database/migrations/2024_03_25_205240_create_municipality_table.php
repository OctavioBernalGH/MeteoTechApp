<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('municipality', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('municipality_code', 10);
            $table->string('municipality_name', 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('municipality');
    }
};
