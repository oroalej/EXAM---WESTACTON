<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaseTable extends Migration
{
  public function up(): void
  {
    if ( !Schema::hasTable('products') ) {
      Schema::create('products', static function ( Blueprint $table ) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->integer('stock')->default(0);
        $table->decimal('price');

        $table->timestamps();
        $table->softDeletes();
      });
    }

    if ( !Schema::hasTable('carts') ) {
      Schema::create('carts', static function ( Blueprint $table ) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('product_id');
        $table->integer('quantity');
        $table->timestamps();

        $table->foreign('product_id')->references('id')->on('products');
      });
    }

    if ( !Schema::hasTable('orders') ) {
      Schema::create('orders', static function ( Blueprint $table ) {
        $table->bigIncrements('id');
        $table->string('order_id')->nullable();
        $table->string('status');
        $table->decimal('total');

        $table->timestamps();
      });
    }

    if ( !Schema::hasTable('product_sales') ) {
      Schema::create('product_sales', static function ( Blueprint $table ) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('product_id');
        $table->unsignedBigInteger('order_id');
        $table->integer('quantity');
        $table->decimal('price');
        $table->decimal('total');

        $table->timestamps();

        $table->foreign('product_id')->references('id')->on('products');
        $table->foreign('order_id')->references('id')->on('orders');
      });
    }
  }

  public function down(): void
  {
    Schema::dropIfExists('product_sales');
    Schema::dropIfExists('carts');
    Schema::dropIfExists('products');
    Schema::dropIfExists('orders');
  }
}
