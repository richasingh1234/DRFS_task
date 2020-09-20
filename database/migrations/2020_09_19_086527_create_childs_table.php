<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('motherName');
            $table->string('fatherName');
            $table->enum('sex', array('Male', 'Female', 'Other'))->default('Male');
            $table->date('dateOfBirth');
            $table->unsignedInteger('createdBy');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('district_id');
            $table->foreign('createdBy')->references('id')->on('users')->nullable()->constrained();
            $table->foreign('state_id')->references('id')->on('states')->nullable()->constrained();
            $table->foreign('district_id')->references('id')->on('districts')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('childs');
    }
}
