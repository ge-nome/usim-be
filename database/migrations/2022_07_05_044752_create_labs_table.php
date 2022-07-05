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
        Schema::create('labs', function (Blueprint $table) {
            $table->id();
            $table->string('mat_no');
            $table->string('weight');
            $table->string('height');
            $table->string('eye_vision');
            $table->string('blood_press');

            $table->string('hb');
            $table->string('pc');
            $table->string('genotype');
            $table->string('hiv');
            $table->string('wbc');
            $table->string('urine_microscopy');
            $table->string('urinalysis');
            $table->string('stool_microscopy');
            $table->string('kin_snip');
            $table->string('pregnancy');
            $table->string('recomendation');
            $table->string('officer');

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
        Schema::dropIfExists('labs');
    }
};
