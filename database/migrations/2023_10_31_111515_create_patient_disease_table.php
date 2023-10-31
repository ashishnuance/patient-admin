<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_disease', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('disease_code')->unsigned();
            $table->foreign('disease_code')->references('id')->on('disease')->onDelete('cascade');

            $table->bigInteger('patient_code')->unsigned();
            $table->foreign('patient_code')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('c_home_code')->unsigned();
            $table->foreign('c_home_code')->references('id')->on('companies')->onDelete('cascade');

            $table->string('remark')->nullable();
            $table->string('updated_by_user')->nullable();

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
        Schema::dropIfExists('patient_disease');
    }
};
