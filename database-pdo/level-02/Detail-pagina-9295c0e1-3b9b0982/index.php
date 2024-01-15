<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<h1>Welkom op het netland beheerders paneel</h1>

<h2>Series</h2>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Rating</th>
        <th>Details</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $host = 'db';
    $database = 'netland';
    $username = 'bit_academy';
    $password = 'mysql';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->query('SELECT id, title, rating FROM series');
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
            echo '<td>' . htmlspecialchars($row['rating']) . '</td>';
            echo '<td><a href="detail_serie.php?id=' . htmlspecialchars($row['id']) . '">Bekijk details</a></td>';
            echo '</tr>';
        }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    </tbody>
</table>

<h2>Movies</h2>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Duur</th>
        <th>Details</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $query = $pdo->query('SELECT id, title, length_in_minutes FROM movies');
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
            echo '<td>' . htmlspecialchars($row['length_in_minutes']) . '</td>';
            echo '<td><a href="detail_film.php?id=' . htmlspecialchars($row['id']) . '">Bekijk details</a></td>';
            echo '</tr>';
        }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    </tbody>
</table>
</body>
</html>