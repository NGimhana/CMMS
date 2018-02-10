<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');//Electrical,
            $table->string('place');//Sumanadasa Building
            $table->string('sector');//CSE LAB 2
            $table->string('description');//Power Socket Break Down
            $table->string('priority');
            //Maintenance, repair and operations (MRO) -> Preventive(Schedule,Planned Main.),Corrective(After Broken) , Predictive
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
        Schema::dropIfExists('jobs');
    }
}
