<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{

    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignId("post_id")
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete();

            $table->foreignId("category_id")
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
        });
    }


    public function down()
    {
        Schema::dropIfExists('category_post');
    }
}
