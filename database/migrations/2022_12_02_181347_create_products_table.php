<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description');
            $table->text('content');
            $table->string('preview_img');
            
            $table->integer('price');
            $table->integer('count');
            $table->boolean('is_published')->default(true);
             $table->unsignedBigInteger('category_id')->nullable();

            $table->index('category_id', 'product_category_idx');
            $table->foreign('category_id', 'product_category_fk')->on('categories')->references('id');
           
            //$table->foreignId('category_id')->nullable()->index()->constrained('categories');  //для добаления в продуктов в категории
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
