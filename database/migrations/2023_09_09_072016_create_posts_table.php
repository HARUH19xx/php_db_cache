<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('new_users');
            $table->string('image_url', 255);
            $table->string('comment', 100)->nullable();
            $table->timestamps();
            // $table->primary('id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
