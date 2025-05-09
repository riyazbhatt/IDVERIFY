<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('id_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('name');
            $table->string('phone');
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('designation_id')->constrained('designations');
            $table->string('uid')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('id_verifications');
    }
};
