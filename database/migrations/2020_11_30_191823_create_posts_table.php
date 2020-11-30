<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->foreign('author');
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
