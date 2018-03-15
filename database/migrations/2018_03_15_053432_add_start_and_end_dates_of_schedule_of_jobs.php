<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartAndEndDatesOfScheduleOfJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs',function($table){
            $table->date("Job Started Date");
            $table->date("Job Scheduled end Date");
            $table->date("Job Ended Date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs',function($table){
            $table->dropColumn('Job Started Date');
            $table->dropColumn('Job Scheduled end Date');
            $table->dropColumn('Job Ended Date');
        });
    }
}
