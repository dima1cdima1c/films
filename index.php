<?php
require 'db.php';
$result = $conn->query("SELECT * FROM films");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фильмы</title>
</head>
<body>
    <h1>Список фильмов</h1>
<p><a href='create.php'>Добавить фильм</a></p>
    <table border="1" cellpadding="5">
        <tr>
            <th>Название</th><th>Год</th><th>Жанр</th><th>Рейтинг</th>
        <th>Действия</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['year']) ?></td>
                <td><?= htmlspecialchars($row['genre']) ?></td>
                <td><?= htmlspecialchars($row['rating']) ?></td>
            <th>Действия</th>
                <td><a href='edit.php?id=<?= $row['id'] ?>'>Редактировать</a> | <a href='delete.php?id=<?= $row['id'] ?>' onclick="return confirm('Удалить фильм?');">Удалить</a></td></tr>
        <?php endwhile; ?>
    </table>
</body>
</html>