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
        Schema::table('products', function (Blueprint $table) {

            $table->unsignedBigInteger('group_id')->after('category_id')->nullable();
            
            $table->index('group_id', 'product_group_idx');
            $table->foreign('group_id', 'product_group_fk')->on('groups')->references('id');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('product_group_fk'); 
            $table->dropIndex('product_group_idx');
            $table->dropColumn('group_id');
        });
    }
};
