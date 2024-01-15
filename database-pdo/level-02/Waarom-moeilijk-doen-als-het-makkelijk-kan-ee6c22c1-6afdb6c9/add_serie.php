<?php

include "database.php";

if (isset($_POST) && !empty($_POST['submit'])) {
    $title = $_POST['title'] ?? '';
    $country = $_POST['country'] ?? '';
    $seasons = $_POST['seasons'] ?? '';
    $has_won_awards = boolval($_POST['has_won_awards'] ?? '');
    $rating = $_POST['rating'] ?? '';
    $summary = $_POST['summary'] ?? '';
    $spoken_in_language = $_POST['spoken_in_language'] ?? '';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->query('
        INSERT INTO series (title, country, seasons, has_won_awards, rating, summary, spoken_in_language)
        VALUES ("' . $title . '", "' . $country . '", "' . $seasons . '", "' . $has_won_awards . '", "' . $rating . '", "' . $summary . '", "' . $spoken_in_language . '")
        ');

//        get inserted row
        $query = $pdo->query('SELECT id FROM series WHERE id = ' . $pdo->lastInsertId() . ' LIMIT 1');
        $row = $query->fetch(PDO::FETCH_ASSOC);

        header('Location: edit_serie.php?id=' . $row['id']);
        exit();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        exit();
        echo 'Serie kon niet toegevoegd worden. ';
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

<h2>Voeg nieuwe serie toe</h2>
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
            <td><input name="title" type="text""></td>
        </tr>
        <tr>
            <td><strong>Awards</strong></td>
            <td>
                <select name="has_won_awards">
                    <option value="true">Ja</option>
                    <option value="false">Nee</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Seasons</strong></td>
            <td><input name="seasons" type="number"></td>
        </tr>
        <tr>
            <td><strong>Country</strong></td>
            <td><input name="country" type="text"></td>
        </tr>
        <tr>
            <td><strong>Language</strong></td>
            <td><input name="spoken_in_language" type="text"></td>

        </tr>
        <tr>
            <td><strong>Rating</strong></td>
            <td><input name="rating" type="number"></td>

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