<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPLCModuleSa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_plc_module_sa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('assessed_by');
            $table->String('checked_by');
            $table->String('control_no');
            $table->String('key_control');
            $table->String('it_control');
            $table->String('internal_control');
            $table->String('dic_assessment');
            $table->String('dic_status');
            $table->String('oec_assessment');
            $table->String('oec_status');
            $table->String('rf_improvement');
            $table->String('rf_assessment');
            $table->String('rf_status');
            $table->unsignedTinyInteger('logdel')->default(0)->comment = '0-show,1-hide';
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
        Schema::dropIfExists('tbl_plc_module_sa');
    }
}
