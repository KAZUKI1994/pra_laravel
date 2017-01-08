<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyingArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 記事テーブルに対して外部キーを追加する
        Schema::create('articles', function(Blueprint $table)
        {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->string('title');
          $table->text('body');
          $table->timestamps();
          $table->timestamp('published_at')->nullable();

          $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //既存の記事テーブルを削除する
        Schema::drop('articles');
    }
}
