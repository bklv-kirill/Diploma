<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Region::class, 'region_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->double('geo_lat')->nullable();
            $table->double('geo_lon')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
