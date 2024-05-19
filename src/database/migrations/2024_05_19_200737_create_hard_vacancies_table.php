<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('hard_vacancy', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Hard::class, 'hard_id')
                ->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Vacancy::class, 'vacancy_id')
                ->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hard_vacancy');
    }

};
