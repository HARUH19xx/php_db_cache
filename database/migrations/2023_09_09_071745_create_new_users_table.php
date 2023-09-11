<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('new_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 24)->unique();
            $table->text('profile')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('password', 255);
            $table->timestamps();
            // $table->primary('id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('new_users');
    }
};
