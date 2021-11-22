<?php

	class Movie
	{
		public static function getMovies() {
            $json = file_get_contents("https://imdb-api.com/en/API/Top250Movies/k_7a4cqx71");
            $data = json_decode($json, true);
            $movies = [];
            if($data["errorMessage"] == '') {
                foreach ($data["items"] as $item) {
                    array_push($movies, ["rank" => $item["rank"],"title" => $item["title"],"image" => $item["image"],]);
                }
            }
			return $movies;
		}

		public static function toHtml($movie) {
			echo "<tr>"
				. "<td>". $movie["rank"] . "</td>"
				. "<td>". $movie["title"] . "</td>"
				. "<td><img src=\"" . $movie["image"] . "\"/></td></tr>";
		}

		public static function showMoviesAsTable($movies) {
			echo '<table><thead>
					<tr><th>Rank</th><th>Title</th><th>Image</th></tr></thead><tbody>';
			foreach($movies as $movie) {
				static::toHtml($movie);
			}
			echo '</tbody></table>';
		}

		public static function showMovies() {
			static::showMoviesAsTable(static::getMovies());
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style>
		table {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		}

		td {
			text-align: center;
			padding-left: 2em;
			padding-right: 2em;
		}
		</style>
	</head>
	<body>
		<h1>Movies</h1>
		<?php
			Movie::showMovies();
		?>
	</body>
</html>

