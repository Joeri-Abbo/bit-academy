<?php

include "database.php";

$updated = false;
if (isset($_POST) && !empty($_POST['submit'])) {
    $title = $_POST['title'] ?? '';
    $released_at = $_POST['released_at'] ?? '';
    $country_of_origin = $_POST['country_of_origin'] ?? '';
    $length_in_minutes = $_POST['length_in_minutes'] ?? '';
    $summary = $_POST['summary'] ?? '';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->query('INSERT INTO movies (title, released_at, country_of_origin, length_in_minutes, summary) VALUES ("' . $title . '", "' . $released_at . '", "'
            . $country_of_origin . '", "' . $length_in_minutes . '", "' . $summary . '")');
        $row = $query->fetch(PDO::FETCH_ASSOC);

        $query = $pdo->query('SELECT id FROM movies WHERE id = ' . $pdo->lastInsertId() . ' LIMIT 1');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        header('Location: edit_film.php?id=' . $row['id']);
        exit();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        exit();
        echo 'Film kon niet geupdate worden. ';
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<h2>
    Voeg een film toe
</h2>
<form action="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" method="POST">
    <table>
        <thead>
        <tr>
            <th>Information</th>
            <th>Information</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><strong>Title</strong></td>
            <td><input name="title" type="text"></td>
        </tr>
        <tr>
            <td><strong>Datum van uitkomst</strong></td>
            <td><input name="released_at"></td>
        </tr>
        <tr>
            <td><strong>Land van uitkomst</strong></td>
            <td><input name="country_of_origin" type="text"></td>

        </tr>
        <tr>
            <td><strong>Duur in minuten</strong></td>
            <td>
                <input name="length_in_minutes" type="number">
            </td>
        </tr>

        </tbody>
    </table>
    <h2>Beschrijving</h2>
    <p>
        <label>
            <textarea name="summary"></textarea>
        </label>
    </p>
    <input name="submit" type="submit">
</form>

</body>
</html>