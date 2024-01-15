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
    $released_at = $_POST['released_at'] ?? '';
    $country_of_origin = $_POST['country_of_origin'] ?? '';
    $length_in_minutes = $_POST['length_in_minutes'] ?? '';
    $summary = $_POST['summary'] ?? '';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->query('UPDATE movies SET title = "' . $title . '", released_at = "' . $released_at . '", country_of_origin = "' . $country_of_origin . '", length_in_minutes = "'
            . $length_in_minutes . '", summary = "' . $summary . '" WHERE id = ' . $id . ' LIMIT 1');
        $row = $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        exit();
        echo 'Film kon niet geupdate worden. ';
        exit();
    }


    $updated = true;
}
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $pdo->query('SELECT * FROM movies WHERE id = ' . $id . ' LIMIT 1');
    $row = $query->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'De film met id ' . $id . ' kon niet worden opgehaald uit de database.';
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
<h2>
    <?php echo htmlspecialchars($row['title']); ?>
    <a class="link-edit" href="edit_film.php?id=<?= $id; ?>">Wijzigen</a>
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
            <td><strong>ID</strong></td>
            <td><input disabled value="<?php echo htmlspecialchars($row['id']); ?>"></td>
        </tr>
        <tr>
            <td><strong>Title</strong></td>
            <td><input name="title" type="text" value="<?php echo htmlspecialchars($row['title']); ?>"></td>
        </tr>
        <tr>
            <td><strong>Datum van uitkomst</strong></td>
            <td><input name="released_at" value="<?php echo htmlspecialchars($row['released_at']); ?>"></td>
        </tr>
        <tr>
            <td><strong>Land van uitkomst</strong></td>
            <td><input name="country_of_origin" type="text"
                       value="<?php echo htmlspecialchars($row['country_of_origin']); ?>"></td>

        </tr>
        <tr>
            <td><strong>Duur in minuten</strong></td>
            <td>
                <input name="length_in_minutes" type="number"
                       value="<?php echo htmlspecialchars($row['length_in_minutes']); ?>">
            </td>
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