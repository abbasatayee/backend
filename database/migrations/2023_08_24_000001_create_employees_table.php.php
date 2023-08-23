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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('photo');
            $table->enum('position', ['manager', 'seller']);
            $table->string('phone');
            $table->enum('gender', ['male', 'female']);
            $table->integer('salary');
            $table->unsignedBigInteger('store_id')->nullable()->default(null);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('set null');
            $table->timestamps();
        });
        Schema::create('employee_product', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
