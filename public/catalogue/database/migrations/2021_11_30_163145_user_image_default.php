<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserImageDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatarUrl')->default('https://45secondes.fr/wp-content/uploads/2021/05/Y-aura-t-il-Komi-san-wa-Comyushou-Anime-Adaptation-Tout-ce-que.png')->change();
            $table->string('bannerUrl')->default('https://furansujapon.com/wp-content/uploads/2021/05/Komi-san-wa-Komyushou-Desu.jpg')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
