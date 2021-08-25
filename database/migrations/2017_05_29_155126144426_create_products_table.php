<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->decimal('regular_price');
            $table->decimal('sale_price')->nullable();
            $table->string('sku');
            $table->enum('stock_status', ['in_stock', 'outofstock']);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(10);
            $table->text('image')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->timestamps();
//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
}
