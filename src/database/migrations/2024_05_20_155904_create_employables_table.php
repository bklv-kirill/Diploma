<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('employables', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Employment::class, 'employment_id')
                ->constrained()->cascadeOnDelete();
            $table->morphs('employable');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employables');
    }

};
