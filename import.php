<?php
require 'db.php';

$json = file_get_contents('kinopoisk_top250.json');
$films = json_decode($json, true);

foreach ($films as $film) {
    $title = $conn->real_escape_string($film['title']);
    $year = (int)$film['year'];
    $genre = $conn->real_escape_string($film['genre']);
    $rating = (float)$film['rating'];

    $sql = "INSERT INTO films (title, year, genre, rating) VALUES ('$title', $year, '$genre', $rating)";
    $conn->query($sql);
}

echo "Импорт завершен!";
?>