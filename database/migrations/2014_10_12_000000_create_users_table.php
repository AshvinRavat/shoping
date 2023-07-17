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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('user_type', ['0', '1'])
            ->default('0')->comment('0 => Customer,1 => Admin');
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->string('phone', 12)->nullable();
            $table->string('address_line_1', 150)->nullable();
            $table->string('address_line_2', 150)->nullable();
            $table->string('city', 70)->nullable();
            $table->string('post_code', 6)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
