<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\District::class, 'district_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
