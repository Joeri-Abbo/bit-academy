<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            padding: 5% 10%;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Welkom op het netland beheerders paneel</h1>

<h2>Series</h2>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Rating</th>
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

        $query = $pdo->query('SELECT title, rating FROM series');
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
            echo '<td>' . htmlspecialchars($row['rating']) . '</td>';
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
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $query = $pdo->query('SELECT title, length_in_minutes FROM movies');
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
            echo '<td>' . htmlspecialchars($row['length_in_minutes']) . '</td>';
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