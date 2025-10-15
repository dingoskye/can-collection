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
        Schema::create('cans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained();
            $table->string('name', length: 150);
            $table->bigInteger('content');
            $table->string('color', length: 100);
            $table->mediumInteger('release_year');
            $table->boolean('sugarfree')->default(false);
            $table->bigInteger('calories');
            $table->boolean('limited_edition')->default(false);
            $table->bigInteger('caffeine');
            $table->boolean('carbonated')->default(true);
            $table->text('description');
            $table->string('country', length: 100);
            $table->string('sku', length: 100)->nullable();
            $table->string('gtin', length: 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cans');
    }
};
