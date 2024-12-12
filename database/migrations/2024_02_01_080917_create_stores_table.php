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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('language_id'); 
            $table->foreign('language_id')
                  ->references('id')->on('language')
                  ->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->string('url');
            $table->string('destination_url');
            $table->string('category')->nullable();
            $table->longText('meta_tag')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('status');
            $table->string('authentication')->nullable();
            $table->string('network')->nullable();
            $table->string('store_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
