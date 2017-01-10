<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->string('buttonText');
            $table->string('link');
            $table->string('type');
            $table->integer('parent_id')->unsigned()->index();
            $table->timestamps();
        });


        Schema::table('m_children', function($table) {
            $table->foreign('parent_id')->references('id')->on('m_parents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('m_children');
    }
}
