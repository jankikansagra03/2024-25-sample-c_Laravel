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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('profile_picture')->nullable(false)->default('default.png');
            $table->string('role')->nullable(false)->default('user');
            $table->string('status')->nullable(false)->default('Inactive');
            $table->string('token')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
