<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('chartables', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Chart::class, 'chart_id')
                ->constrained()->cascadeOnDelete();
            $table->morphs('chartable');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chartables');
    }

};
