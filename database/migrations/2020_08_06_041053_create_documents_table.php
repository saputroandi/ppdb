<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->longText('img_semester_1');
            $table->longText('img_semester_2');
            $table->longText('img_semester_3');
            $table->longText('img_semester_4');
            $table->longText('img_semester_5');
            $table->longText('img_semester_6');
            $table->longText('img_skhun');
            $table->longText('img_akta');
            $table->longText('img_kk');
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
        Schema::dropIfExists('documents');
    }
}
