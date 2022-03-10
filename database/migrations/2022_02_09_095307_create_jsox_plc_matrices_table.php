<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJsoxPlcMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jsox_plc_matrices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('process_name');
            $table->string('control_no');
            $table->string('document');
            $table->string('frequency');
            $table->string('samples');
            $table->string('in_charge');
            $table->unsignedTinyInteger('status')->default(1)->comment = '1-active,2-inactive';
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('jsox_plc_matrices');
    }
}
