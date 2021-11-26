<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [];
        $users = DB::table('users')->select('id')->get();
        $medias = DB::table('medias')->select('id')->get()->toArray();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 3; $i++) {
            foreach ($users as $user) {
                array_push($comments, [
                    "user_id" => $user->id,
                    "media_id" => array_rand($medias),
                    "text" => $faker->sentence(),
                ]);
            }
        }
        DB::table('comments')->insert($comments);
    }
}
