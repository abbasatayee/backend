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
        Schema::create('grand_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('year');
            $table->char('month');
            $table->date('date');
            $table->integer('deduction_amount');
            $table->integer('net_pay_amount');
            $table->boolean('is_paid')->default(false);
            $table->integer('pay_amount');
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
        Schema::dropIfExists('grand_payments');
    }
};
