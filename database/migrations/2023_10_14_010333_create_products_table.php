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
            $table->increments('product_id');
            $table->string('name')->notNull();
            $table->text('description');
            $table->decimal('price')->notNull();
            $table->unsignedBigInteger('category_id');
            
            $table->foreign('category_id')
                  ->references('category_id')
                  ->on('categories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->string('image_url');
            $table->integer('stock_quantity')->notNull();
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
