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
        Schema::create('mobiles', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_nu', 11)->unique();
            $table->string('otp', 10)->nullable();
            $table->string('otp_sent_time')->nullable();
            $table->string('request_ip', 15)->nullable();
            $table->string('created', 19)->nullable();
            $table->string('updated', 19)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobiles');
    }
};
