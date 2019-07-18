<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOAuthAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aouth_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id', false, true);
            $table->text('nick_name')->nullable();
            $table->text('name');
            $table->text('fisrt_name');
            $table->text('last_name');
            $table->text('oauth_id');
            $table->text('provider_name');
            $table->string('email')->nullable();
            $table->longText('avatar')->nullable();
            $table->longText('token');
            //oauth2
            $table->longText('refreshToken')->nullable();
            $table->integer('expiresIn', false, true)->nullable();
            //oauth1
            $table->longText('tokenSecret')->nullable();

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
        Schema::dropIfExists('aouth_accounts');
    }
}
