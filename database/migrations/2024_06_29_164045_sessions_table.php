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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->comment('ユーザー名');
            $table->string('title')->comment('タイトル');
            $table->integer('platform')->length(1)->comment('プラットフォームEnum');
            $table->string('url')->nullable()->comment('URL');
            $table->string('password')->comment('パスワード');
            $table->integer('passion_level')->length(1)->comment('ガチ度Enum');
            $table->text('content')->nullable()->comment('内容');
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
        Schema::dropIfExists('sessions');
    }
};
