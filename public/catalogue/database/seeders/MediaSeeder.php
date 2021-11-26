<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://imdb-api.com/en/API/Top250Movies/k_7a4cqx71");
        $data = json_decode($json, true);
        $movies = [];
        if ($data["errorMessage"] == '') {
            foreach ($data["items"] as $item) {
                array_push(
                    $movies,
                    [
                        "id" => $item["rank"],
                        "title" => $item["title"],
                        "image" => $item["image"],
                    ]
                );
            }
        }

        DB::table('medias')->insert($movies);
    }
}
