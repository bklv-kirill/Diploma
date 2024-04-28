<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('university_user', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\University::class, 'university_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class, 'user_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('university_user');
    }
};
