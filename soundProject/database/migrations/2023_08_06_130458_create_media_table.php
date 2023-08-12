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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('mediaName');
            $table->unsignedBigInteger('mediaTypeId');
            $table->foreign('mediaTypeId')->references('id')->on('media_type');
            $table->string('mediaPhoto')->nullable();
            $table->string('mediaURL');
            $table->string('extension');
            
            // Add the foreign key columns for artist and lyricist
            $table->unsignedBigInteger('artist_id')->nullable();
            $table->unsignedBigInteger('lyricist_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
