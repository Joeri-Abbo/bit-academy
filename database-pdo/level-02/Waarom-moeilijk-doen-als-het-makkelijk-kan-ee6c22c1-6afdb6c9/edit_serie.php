<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    // Redirect to index.php because no id was given
    header('Location: index.php');
    exit();
}

include "database.php";

$updated = false;
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

        $query = $pdo->query('UPDATE series SET title = "' . $title . '", country = "' . $country . '", seasons = "' . $seasons . '", has_won_awards = "' . $has_won_awards . '", rating = "' .
            $rating . '", summary = "' . $summary . '", spoken_in_language = "' . $spoken_in_language . '" WHERE id = ' . $id . ' LIMIT 1');
        $row = $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        exit();
        echo 'Serie kon niet geupdate worden. ';
        exit();
    }


    $updated = true;
}
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $pdo->query('SELECT * FROM series WHERE id = ' . $id . ' LIMIT 1');
    $row = $query->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'De film met id ' . $id . ' kon niet worden opgehaald uit de database . ';
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php if ($updated) : ?>
    <div class="alert alert-success">
        De serie is succesvol gewijzigd!
    </div>
<?php endif; ?>

<h2><?php echo htmlspecialchars($row['title']); ?></h2>
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
            <td><strong>ID</strong></td>
            <td><input disabled value="<?php echo htmlspecialchars($row['id']); ?>"></td>
        </tr>
        <tr>
            <td><strong>Title</strong></td>
            <td><input name="title" type="text" value="<?php echo htmlspecialchars($row['title']); ?>"></td>
        </tr>
        <tr>
            <td><strong>Awards</strong></td>
            <td>
                <select name="has_won_awards">
                    <option value="true" <?= $row['has_won_awards'] == true ? "selected" : ""; ?> >Ja</option>
                    <option value="false" <?= $row['has_won_awards'] == false ? "selected" : ""; ?>>Nee</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Seasons</strong></td>
            <td><input name="seasons" type="number" value="<?php echo htmlspecialchars($row['seasons']); ?>"></td>
        </tr>
        <tr>
            <td><strong>Country</strong></td>
            <td><input name="country" type="text" value="<?php echo htmlspecialchars($row['country']); ?>"></td>
        </tr>
        <tr>
            <td><strong>Language</strong></td>
            <td><input name="spoken_in_language" type="text"
                       value="<?php echo htmlspecialchars($row['spoken_in_language']); ?>"></td>

        </tr>
        <tr>
            <td><strong>Rating</strong></td>
            <td><input name="rating" type="number" value="<?php echo htmlspecialchars($row['rating']); ?>"></td>

        </tr>
        </tbody>
    </table>
    <h2>Beschrijving</h2>
    <p>
        <label>
            <textarea name="summary"><?php echo htmlspecialchars($row['summary']); ?></textarea>
        </label>
    </p>
    <input name="submit" type="submit">
</form>

</body>
</html>