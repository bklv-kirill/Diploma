<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('salary_from');
            $table->unsignedBigInteger('salary_to');

            $table->foreignIdFor(\App\Models\City::class, 'city_id')
                ->constrained()->cascadeOnDelete();

            $table->foreignIdFor(\App\Models\User::class, 'user_id')
                ->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }

};
