<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->double('geo_lat')->after('name')->nullable();
            $table->double('geo_lon')->after('geo_lat')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('geo_lat');
            $table->dropColumn('geo_lon');
        });
    }
};
