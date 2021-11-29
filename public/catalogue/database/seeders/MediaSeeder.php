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
        $opts = array(
            'http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
            )
        );
        $context  = stream_context_create($opts);

        $json = file_get_contents("https://graphql.anilist.co/?query={%0A%20 Page(page%3A 1) {%0A%20%20%20 media(type%3A ANIME%2C sort%3A SCORE_DESC) {%0A%20%20%20%20%20 id%0A%20%20%20%20%20 title {%0A%20%20%20%20%20%20%20 english%0A%20%20%20%20%20%20%20 native%0A%20%20%20%20%20 }%0A%20%20%20%20%20 coverImage {%0A%20%20%20%20%20%20%20 large%0A%20%20%20%20%20 }%0A%20%20%20%20%20 trailer{%0A%20%20%20%20%20%20%20 id%0A%20%20%20%20%20 }%0A%20%20%20%20%20 description%0A%20%20%20%20%20 tags {%0A%20%20%20%20%20%20%20 name%0A%20%20%20%20%20 }%0A%20%20%20 }%0A%20 }%0A}%0A", false, $context);
        $data = json_decode($json, true);

        $animes = [];
        $tags = [];
        if ($data["data"] != null) {
            foreach ($data["data"]["Page"]["media"] as $item) {
                array_push(
                    $animes,
                    [
                        "id" => $item["id"],
                        "title" => $item["title"]["english"] == null ? $item["title"]["native"] : $item["title"]["english"],
                        "imageUrl" => $item["coverImage"]["large"],
                        "trailerUrl" => $item["trailer"] == null ? "" : "https://youtu.be/" . $item["trailer"]["id"],
                        "description" => $item["description"],
                        "type" => 'ANIME'
                    ]
                );
                $allTags =  array_slice($item["tags"], 0, 3);
                foreach ($allTags as $tag) {
                    array_push(
                        $tags,
                        [
                            "media_id" => $item["id"],
                            "name" => $tag["name"],
                        ]
                    );
                }
            }
        }

        // $json = file_get_contents("https://graphql.anilist.co/?query={%0A%20 Page(page%3A 1) {%0A%20%20%20 media(type%3A MANGA%2C sort%3A SCORE_DESC) {%0A%20%20%20%20%20 id%0A%20%20%20%20%20 title {%0A%20%20%20%20%20%20%20 english%0A%20%20%20%20%20%20%20 native%0A%20%20%20%20%20 }%0A%20%20%20%20%20 coverImage {%0A%20%20%20%20%20%20%20 large%0A%20%20%20%20%20 }%0A%20%20%20%20%20 trailer{%0A%20%20%20%20%20%20%20 id%0A%20%20%20%20%20 }%0A%20%20%20%20%20 description%0A%20%20%20%20%20 tags {%0A%20%20%20%20%20%20%20 name%0A%20%20%20%20%20 }%0A%20%20%20 }%0A%20 }%0A}%0A", false, $context);
        // $data = json_decode($json, true);
        // $mangas = [];
        // if ($data["data"] != null) {
        //     foreach ($data["data"]["Page"]["media"] as $item) {
        //         array_push(
        //             $mangas,
        //             [
        //                 "id" => $item["id"],
        //                 "title" => $item["title"]["english"] == null ? $item["title"]["native"] : $item["title"]["english"],
        //                 "imageUrl" => $item["coverImage"]["large"],
        //                 "trailerUrl" => "",
        //                 "description" => $item["description"],
        //                 "type" => 'MANGA'
        //             ]
        //         );
        //         $allTags =  array_slice($item["tags"], 0, 3);
        //         foreach ($allTags as $tag) {
        //             array_push(
        //                 $tags,
        //                 [
        //                     "media_id" => $item["id"],
        //                     "name" => $tag["name"],
        //                 ]
        //             );
        //         }
        //     }
        // }

        // DB::table('medias')->insert($mangas);
        DB::table('medias')->insert($animes);
        DB::table('tags')->insert($tags);
    }
}
