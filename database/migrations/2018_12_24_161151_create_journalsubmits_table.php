<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journalsubmits', function (Blueprint $table) {
            $table->increments('id');
             $table->string('user_id');
            $table->mediumText('abstract');
            $table->mediumText('maintext');
             $table->mediumText('figures');
            $table->mediumText('tables');
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
        Schema::dropIfExists('journalsubmits');
    }
}
