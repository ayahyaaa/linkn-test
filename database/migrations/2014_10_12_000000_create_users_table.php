<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password')->nullable();
            $table->string('provider_id')->nullable();
            $table->text('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('background_color')->default('#ffffff');
            $table->string('text_color')->default('#000000');
            $table->string('cards_border_color')->default('#000000');
            $table->string('cards_type')->default("1");
            $table->string('bg_img')->default('https://i.postimg.cc/V6c0M1wB/background-image-tp.png');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
