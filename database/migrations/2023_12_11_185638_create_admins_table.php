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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('maritalstatus');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('dateofbirth');
            $table->bigInteger('mobilenumber');
            $table->string('address')->default('wahcantt');
            $table->string('image')->nullable();
            $table->string('salary')->nullable();
            $table->string('attendance')->nullable();
            $table->string('position')->nullable();
            $table->string('type');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
