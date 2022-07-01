<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlcModuleSaFuAssessmentDetailsAndFindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plc_module_sa_fu_assessment_details_and_findings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sa_id');
            $table->string('category');
            $table->string('counter');
            $table->string('fu_assessment_details_findings');
            $table->text('fu_attachment');
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
        Schema::dropIfExists('plc_module_sa_fu_assessment_details_and_findings');
    }
}
