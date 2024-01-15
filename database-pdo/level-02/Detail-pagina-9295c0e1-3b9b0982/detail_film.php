<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    // Redirect to index.php because no id was given
    header('Location: index.php');
    exit();
}

$host = 'db';
$database = 'netland';
$username = 'bit_academy';
$password = 'mysql';

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

<h2><?php echo htmlspecialchars($row['title']); ?></h2>
<table>
    <thead>
    <tr>
        <th>Information</th>
        <th>Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><strong>Datum van uitkomst</strong></td>
        <td><?php echo htmlspecialchars($row['released_at']); ?></td>
    </tr>
    <tr>
        <td><strong>Land van uitkomst</strong></td>
        <td><?php echo htmlspecialchars($row['country_of_origin']); ?></td>
    </tr>
    <tr>
        <td><strong>Duur</strong></td>
        <td><?php echo htmlspecialchars($row['length_in_minutes']); ?> minuten</td>
    </tr>

    </tbody>
</table>
<h2>Beschrijving</h2>
<p>
    <?php echo htmlspecialchars($row['summary']); ?>
</p>

</body>
</html>