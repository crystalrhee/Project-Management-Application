<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', array('active', 'icebox', 'complete'));
            $table->string('phase');
            $table->enum('type', array('project', 'feature'));
            $table->date('start_date');
            $table->date('end_date');
            $table->string('client');  //foreign key
            $table->longText('description');
            $table->longText('notes');
            $table->string('contacts');  //foreign key
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
        Schema::dropIfExists('projects');
    }
}
