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
            $table->string('sku');
            $table->string('product_name');
            $table->string('p_code');
            $table->enum('type',['expirable','un_expirable']);
            $table->date('expiration_date')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('unit');
            $table->string('description')->nullable();
            $table->integer('number_of_sales')->nullable();
            $table->boolean('is_published')->default(false);
            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null');
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
