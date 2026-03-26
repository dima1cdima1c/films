<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $year = (int)$_POST['year'];
    $genre = $conn->real_escape_string($_POST['genre']);
    $rating = (float)$_POST['rating'];

    $sql = "INSERT INTO films (title, year, genre, rating) VALUES ('$title', $year, '$genre', $rating)";
    $conn->query($sql);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head><meta charset="UTF-8"><title>Добавить фильм</title></head>
<body>
<h1>Добавить фильм</h1>
<form method="post">
    Название: <input type="text" name="title"><br>
    Год: <input type="number" name="year"><br>
    Жанр: <input type="text" name="rating"><br>
    Рейтинг: <input type="text" name="rating"><br>
    <button type="submit">Сохранить</button>
</form>
</body>
</html>