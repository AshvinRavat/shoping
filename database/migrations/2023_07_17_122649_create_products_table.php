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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->string('image', 60);
            $table->decimal('price', 6);
            $table->string('description', 255);
            $table->decimal('stock', 6)->comment('count of product');
            $table->enum('published', ['pending', 'activate', 'deactivate'])
                ->default('pending')
                ->comment('it will list product to customer by publish status');
            $table->enum('payment_options', ['STRIPE', 'COD', 'ONLINE'])
                ->default('STRIPE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
