<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled__jobs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('type');
            $table->integer('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('assets');
            $table->string('description');
            $table->string('priority')->default('Schedule');
            $table->date('Scheduled_Date');
            $table->integer('End_Year');
            $table->integer('frequency');//[3,6,4,12] months
            $table->date('Ended_Date');
            $table->date('Last_Updated_Date');
            $table->integer('created_user_id')->unsigned();
            $table->foreign('created_user_id')->references('id')->on('users');
            $table->integer('Assigned_Person_id')->unsigned();
            $table->foreign('Assigned_Person_id')->references('id')->on('users');
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
        Schema::dropIfExists('scheduled__jobs');
    }
}
