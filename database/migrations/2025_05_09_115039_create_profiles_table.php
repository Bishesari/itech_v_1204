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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->boolean('iranian')->default(true);
            $table->string('n_code', 15);
            $table->boolean('gender')->nullable();
            $table->string('f_name_fa', 40)->nullable();
            $table->string('l_name_fa', 50)->nullable();
            $table->string('f_name_en', 40)->nullable();
            $table->string('l_name_en', 50)->nullable();
            $table->string('father', 40)->nullable();
            $table->char('created', 19);
            $table->char('updated', 19)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
