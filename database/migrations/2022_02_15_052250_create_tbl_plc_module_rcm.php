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
            $table->unsignedTinyInteger('status')->default(0)->comment = '1-active,2-Inactive';
            $table->string('control_objective');
            $table->longText('risk_summary');
            $table->longText('risk_detail');
            $table->string('debit');
            $table->string('credit');
            $table->string('validity');
            $table->string('completeness');
            $table->string('accuracy');
            $table->string('cut_off');
            $table->string('valuation');
            $table->string('presentation');
            $table->string('key_control');
            $table->string('it_control');
            $table->string('control_id');
            $table->longText('internal_control');
            $table->string('preventive');
            $table->string('defective');
            $table->string('manual');
            $table->string('automatic');
            $table->string('system');
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
