<?php
require 'db.php';
$id = (int)$_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $year = (int)$_POST['year'];
    $genre = $conn->real_escape_string($_POST['genre']);
    $rating = (float)$_POST['rating'];

    $sql = "UPDATE films SET title='$title', year=$year, genre='$genre', rating=$rating WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
    exit;
}

$result = $conn->query("SELECT * FROM films WHERE id=$id");
$film = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ru">
<head><meta charset="UTF-8"><title>Редактировать фильм</title></head>
<body>
<h1>Редактировать фильм</h1>
<form method="post">
    Название: <input type="text" name="title" value="<?= htmlspecialchars($film['title']) ?>"><br>
    Год: <input type="number" name="year" value="<?= $film['year'] ?>"?><br>
    Жанр: <input type="text" name="genre" value="<?= htmlspecialchars($film['genre']) ?>"><br>
    Рейтинг: <input type="text" name="rating" value=" <?= $film['rating'] ?>"><br>
    <button type="submit">Сохранить изменения</button>
</form>
</body>
</html> 