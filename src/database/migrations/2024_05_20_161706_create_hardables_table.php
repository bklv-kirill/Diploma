<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('hardables', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Hard::class, 'hard_id')
                ->constrained()->cascadeOnDelete();
            $table->morphs('hardable');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hardables');
    }

};
