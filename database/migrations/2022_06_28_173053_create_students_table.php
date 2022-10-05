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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("mat_no");
            $table->string("surname");
            $table->string("firstname");
            $table->string("othername")->nullable();
            $table->string("department");
            $table->string("school");
            $table->string("course");
            $table->string("level");
            $table->integer("status")->default(1);
            $table->text("passport");
            $table->text('qr_hash');
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
        Schema::dropIfExists('students');
    }
};
