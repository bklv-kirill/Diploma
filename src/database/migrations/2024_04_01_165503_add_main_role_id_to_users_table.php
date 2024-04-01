<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('password', function () use ($table) {
                $table->foreignIdFor(\App\Models\MainRole::class, 'main_role_id')->constrained()->cascadeOnDelete();
            });
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_main_role_id_foreign');
        });
    }
};
