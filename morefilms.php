<?php
include 'db.php';
$filmsNewCount = $_POST['filmsNewCount'];

echo '<table class="movietable"><tr>
        <th>Filmi nimi</th>
        <th>Aasta</th>
        <th>Žanr</th>
        <th>Kestus minutites</th>
    </tr>';

$sql = "SELECT MovieName, MovieYear, GenreName, MovieTime FROM Genres JOIN Movies ON Genres.GenreID = Movies.MovieGenre LIMIT $filmsNewCount";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
    $moviename = $row["MovieName"];
    $movieyear = $row["MovieYear"];
    $moviegenre = $row["GenreName"];
    $movietime = $row["MovieTime"];

    echo "<tr><td>$moviename</td><td>$movieyear</td><td>$moviegenre</td><td>$movietime</td></tr>";
}
echo '</table>';