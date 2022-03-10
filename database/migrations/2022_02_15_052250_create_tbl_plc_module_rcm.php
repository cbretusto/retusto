<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPLCModuleRcm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_plc_module_rcm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('control_objective');
            $table->String('risk_summary');
            $table->String('risk_detail');
            $table->String('debit');
            $table->String('credit');
            $table->String('validity');
            $table->String('completeness');
            $table->String('accuracy');
            $table->String('cut_off');
            $table->String('valuation');
            $table->String('presentation');
            $table->String('key_control');
            $table->String('it_control');
            $table->String('control_id');
            $table->String('internal_control');
            $table->String('preventive');
            $table->String('defective');
            $table->String('manual');
            $table->String('automatic');
            $table->String('system');
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
        Schema::dropIfExists('tbl_plc_module_rcm');
    }
}
