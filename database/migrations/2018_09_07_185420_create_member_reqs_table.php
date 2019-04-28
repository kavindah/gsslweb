<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_reqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('othername');
            $table->date('birthday');
            $table->string('nic');
            $table->string('designation');
            $table->string('institution');
            $table->string('office_address');
            $table->string('office_tp');
            $table->string('office_email');
            $table->string('home_address');
            $table->string('home_tp');
            $table->string('home_email');
            $table->boolean('preferred_office_address')->default(false);
            $table->boolean('preferred_home_address')->default(false);
            $table->string('profile_photo');
            $table->boolean('lm')->default(false);
            $table->boolean('om')->default(false);
            $table->boolean('sm')->default(false);
            $table->boolean('am')->default(false);
            $table->boolean('im')->default(false);
            $table->boolean('flm')->default(false);
            $table->boolean('fm')->default(false);
            $table->string('addmission_transfer_from');
            $table->string('addmission_transfer_to');
            $table->boolean('befor_member_yes')->default(false);
            $table->boolean('befor_member_no')->default(false);
            $table->string('ceceipt');
            $table->boolean('econ')->default(false);
            $table->boolean('env')->default(false);
            $table->boolean('geophy')->default(false);
            $table->boolean('stru')->default(false);
            $table->boolean('eng')->default(false);
            $table->boolean('ocen')->default(false);
            $table->boolean('sedi')->default(false);
            $table->boolean('hydro')->default(false);
            $table->boolean('marine')->default(false);
            $table->boolean('geochem')->default(false);
            $table->boolean('gemo')->default(false);
            $table->boolean('remote')->default(false);
            $table->boolean('mine')->default(false);
            $table->boolean('quat')->default(false);
            $table->string('other');
            $table->string('first_degree_held');
            $table->string('first_degree_year');
            $table->string('first_degree_uni');
            $table->string('first_degree_country');
            $table->string('sec_degree_held');
            $table->string('sec_degree_year');
            $table->string('sec_degree_uni');
            $table->string('sec_degree_country');
            $table->string('other_degree_held');
            $table->string('other_degree_year');
            $table->string('other_degree_uni');
            $table->string('other_degree_country');
            $table->string('major_subjects');
            $table->string('subjects_level');
            $table->string('proposer_name');
            $table->string('proposer_mem_no');
            $table->string('seconder_name');
            $table->string('seconder_mem_no');
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
        Schema::dropIfExists('member_reqs');
    }
}
