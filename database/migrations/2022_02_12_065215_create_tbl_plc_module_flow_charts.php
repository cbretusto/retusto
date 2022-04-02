<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPLCModuleFlowCharts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_plc_module_flow_charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('flow_chart_status')->default(0)->comment = '1-active,2-Inactive';
            $table->String('flow_chart');
            $table->String('process_owner');
            $table->String('date_uploaded');
            $table->String('uploaded_by');
            // $table->integer('status');
            $table->String('revised_by');
            $table->bigInteger('rev_history_id')->unsigned();
            $table->unsignedTinyInteger('logdel')->default(0)->comment = '0-show,1-hide';
            $table->timestamps();

            $table->foreign('rev_history_id')->references('id')->on('tbl_plc_modules');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_plc_module_flow_charts');
    }
}
