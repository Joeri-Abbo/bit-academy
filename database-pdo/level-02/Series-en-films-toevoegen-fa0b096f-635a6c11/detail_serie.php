<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    // Redirect to index.php because no id was given
    header('Location: index.php');
    exit();
}

include "database.php";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $pdo->query('SELECT * FROM series WHERE id = ' . $id . ' LIMIT 1');
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

<h2><?php echo htmlspecialchars($row['title']); ?>
    <a class="link-edit" href="edit_serie.php?id=<?= $id; ?>">Wijzigen</a>
</h2>
<table>
    <thead>
    <tr>
        <th>Information</th>
        <th>Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><strong>Awards</strong></td>
        <td><?php echo htmlspecialchars($row['has_won_awards']) ? "Ja" : "Nee"; ?></td>
    </tr>
    <tr>
        <td><strong>Seasons</strong></td>
        <td><?php echo htmlspecialchars($row['seasons']); ?></td>
    </tr>
    <tr>
        <td><strong>Country</strong></td>
        <td><?php echo htmlspecialchars($row['country']); ?></td>
    </tr>
    <tr>
        <td><strong>Language</strong></td>
        <td><?php echo htmlspecialchars($row['spoken_in_language']); ?></td>
    </tr>
    <tr>
        <td><strong>Rating</strong></td>
        <td><?php echo htmlspecialchars($row['rating']); ?></td>
    </tr>
    </tbody>
</table>
<h2>Beschrijving</h2>
<p>
    <?php echo htmlspecialchars($row['summary']); ?>
</p>

</body>
</html>