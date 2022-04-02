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
            $table->string('assessed_by');
            $table->string('checked_by');
            $table->string('control_no');
            $table->string('key_control');
            $table->string('it_control');
            $table->string('internal_control');
            $table->longText('dic_assessment');
            $table->string('dic_attachment');
            $table->string('dic_status');
            $table->longText('oec_assessment');
            $table->string('oec_attachment');
            $table->string('oec_status');
            $table->string('second_half_assessed_by');
            $table->string('second_half_checked_by');
            $table->longText('rf_improvement');
            $table->longText('rf_assessment');
            $table->string('rf_attachment');
            $table->string('rf_status');
            $table->longText('fu_improvement');
            $table->longText('fu_assessment');
            $table->string('fu_attachment');
            $table->string('fu_status');
            $table->string('yec_approved_date');
            $table->unsignedTinyInteger('approver_status')->default(0)->comment = '0-For Update/Approval of Jr. Auditor, 1-Approval of IAS Manager, 2-(1st Half) Approved & (2nd half)For Approval Junior Auditor, 3-(1st Half) Approved & (2nd half) For Approval -IAS Manager, 4-Approved';
            $table->bigInteger('rcm_id')->unsigned();
            $table->unsignedTinyInteger('logdel')->default(0)->comment = '0-show,1-hide';
            $table->timestamps();

            $table->foreign('rcm_id')->references('id')->on('tbl_plc_module_rcm');
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
