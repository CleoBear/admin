<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('director')->unsigned();
            $table->string('describe');
            $table->tinyInteger('rate')->unsigned();
            $table->enum('released', [0, 1]);
            $table->timestamp('release_at')->nullable();
            $table->timestamps();
        });
        /*
        CREATE TABLE `movies` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `director` int(10) unsigned NOT NULL,
            `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `rate` tinyint unsigned NOT NULL,
            `released` enum(0, 1),
            `release_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
        Schema::dropIfExists('movie');
    }
}
