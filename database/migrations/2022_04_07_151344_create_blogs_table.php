<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title');
            $table->string('slug')->unique();
            $table->string('image');
            $table->longText('blog_content');
            $table->enum('status',['published','draft']);
            $table->integer('view_count')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('admin_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');



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
        Schema::dropIfExists('blogs');
    }
}
