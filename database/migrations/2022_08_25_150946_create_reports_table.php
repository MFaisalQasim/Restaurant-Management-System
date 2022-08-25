<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->float('total_income')->nullable();
            $table->float('card_transactions')->nullable();
            $table->float('canceled_sale')->nullable();
            $table->float('supplier_cash')->nullable();
            $table->float('bank_cash_total')->nullable();
            $table->integer('restaurant_id')->nullable();
            $table->string('report_handler')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
