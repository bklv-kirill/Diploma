<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('soft_vacancy', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Soft::class, 'soft_id')
                ->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Vacancy::class, 'vacancy_id')
                ->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soft_vacancy');
    }

};
