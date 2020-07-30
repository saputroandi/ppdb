<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('religion');
            $table->string('name_of_father');
            $table->string('name_of_mother');
            $table->integer('phone_number_1');
            $table->integer('phone_number_2');
            $table->string('district');
            $table->string('sub_district');
            $table->string('urban_village');
            $table->string('address');
            $table->integer('zip_code');
            $table->string('from_jhs');
            $table->integer('nisn');
            $table->integer('no_kk');
            $table->integer('nik_of_student');
            $table->integer('nik_of_father');
            $table->integer('nik_of_mother');
            $table->string('father_occupation');
            $table->string('mother_occupation');
            $table->string('majors_interest');
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
        Schema::dropIfExists('forms');
    }
}
