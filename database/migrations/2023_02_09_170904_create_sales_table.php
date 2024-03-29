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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->date('sale_date')->nullable();
            $table->float('order_tax')->nullable();
            $table->float('discount')->nullable();
            $table->float('shipping')->nullable();
            $table->string('status');
            $table->string('payment');
            $table->string('table')->nullable();
            $table->string('created_by');
            $table->float('sub_total')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sales');
    }
};
