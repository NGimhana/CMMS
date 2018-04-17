<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('job_id')->unsigned()->nullable();;
           // $table->foreign('job_id')->references('id')->on('immediate_jobs');
            $table->integer('scheduled_job_id')->unsigned()->nullable();;
            //$table->foreign('scheduled_job_id')->references('id')->on('scheduled_jobs');
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
        Schema::dropIfExists('calendars');
    }
}
