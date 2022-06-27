<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_resources', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->text('resource_link');
            $table->unsignedBigInteger('job_id');
            $table->integer('hr_resource_category_id');
            $table->timestamps();
        });

        Schema::table('hr_resources', function (Blueprint $table){
            $table->foreign('job_id')->references('id')->on('hr_jobs');
            $table->foreign('hr_resource_category_id')->references('id')->on('hr_resources_categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hr_resources');
    }
}
