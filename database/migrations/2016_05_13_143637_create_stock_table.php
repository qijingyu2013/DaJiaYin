<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //insert into `stock` (`Amplitude`, `Ask`, `Avg`, `Bid`, `Change`, `ChangePerc`, `GroupCode`, `High`, `LastTrade`, `Low`, `Name`, `Open`, `PrevClose`, `Sortnum`, `Source`, `Symbol`, `Turnover`, `UpdateTime`, `Volume`) values (, 3600, , 3593, 29.00, 0.81, JSAG1, 3603.00, 3593, 3541.00, 大圆银10千克, 3557.00, 3564.00, 1, 2, JSAG1, , 2016-05-13 16:58:26, ),
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Amplitude');
            $table->string('Ask');
            $table->string('Avg');
            $table->string('Bid');
            $table->string('Change');
            $table->string('ChangePerc');
            $table->string('GroupCode');
            $table->string('High');
            $table->string('LastTrade');
            $table->string('Low');
            $table->string('Name');
            $table->string('Open');
            $table->string('PrevClose');
            $table->integer('Sortnum');
            $table->string('Source');
            $table->string('Symbol');
            $table->string('Turnover');
            $table->datetime('UpdateTime');
            $table->string('Volume');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('stock');
    }
}
