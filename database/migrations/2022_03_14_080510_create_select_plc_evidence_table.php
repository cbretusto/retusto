<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectPlcEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_plc_evidence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plc_category_id');
            $table->string('plc_sa_id');
            $table->string('plc_evidences_id');
            $table->unsignedTinyInteger('filter')->default(0)->comment = '0-show,1-hide';
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
        Schema::dropIfExists('select_plc_evidence');
    }
}
