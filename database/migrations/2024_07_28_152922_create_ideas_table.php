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
        Schema::create('idea', function (Blueprint $table) {
            $table->integer('idea_id')->unique();
            $table->text('idea_name');
            $table->longText('desc');
            $table->timestamp('deadline');
            $table->bigInteger('price_cents');
            $table->text('img_name');
            $table->integer('author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idea');
    }
};
