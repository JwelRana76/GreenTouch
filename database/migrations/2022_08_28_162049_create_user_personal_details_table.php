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
        // 'fname','lname','father_name','mother_name','date_of_birth','marital_status','gender','nationallity','nid',
        // 'religion','blood_group','present_address','permanent_address','email','primary_mobile','secondary_mobile'
        Schema::create('user_personal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('nationality');
            $table->string('religion');
            $table->string('blood_group')->nullable();
            $table->string('email')->nullable();
            $table->integer('primary_mobile');
            $table->integer('secondary_mobile')->nullable();
            $table->string('present_address');
            $table->string('permanent_address')->nullable();
            $table->integer('nid')->nullable();
            $table->longText('computer_skill')->nullable();
            $table->longText('career_objective')->nullable();
            $table->string('picture')->nullable();
            $table->string('signature')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_personal_details');
    }
};
