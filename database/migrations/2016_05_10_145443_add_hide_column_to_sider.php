<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddHideColumnToSider extends Migration
{
    /**
     * Run the migrations.
     * hide 1是隐藏 0是显示
     * @return void
     */
    public function up()
    {
        Schema::table('sider', function (Blueprint $table) {
            $table->integer('hide');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sider', function (Blueprint $table) {
            $table->dropcolumn('hide');
        });
    }
}
