<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name_table');
            $table->string('status');
            $table->time('check_in_time');
            $table->time('check_out_time');
            $table->time('or_cord');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tables');
    }
};
