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
        Schema::dropIfExists('trips');

        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('trip_number')->unique();
            $table->foreignId('source_city_id');
            $table->foreignId('destination_city_id');
            $table->foreignId('bus_id');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->boolean('is_available')->default(1);
            $table->timestamps();
        });

        Schema::table('trips', function (Blueprint $table)
        {
            $table->foreign('parent_id')->references('id')
                ->on('trips')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
