<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->tinyInteger('age')->unsigned();
            $table->string('gender');
            $table->timestamps();
        });
        /*
        CREATE TABLE `profiles` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
            `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
