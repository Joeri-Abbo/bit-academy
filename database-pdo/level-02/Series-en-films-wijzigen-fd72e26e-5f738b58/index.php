<?php
include "database.php";
function get_url(string $parameter, string $value): string
{
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parsed_url = parse_url($actual_link);
    $query = $parsed_url['query'] ?? '';

    parse_str($query, $parameters);

    $parameters[$parameter] = $value;

    $updated_query = http_build_query($parameters);

    $url = $parsed_url['scheme'] . '://' . $parsed_url['host'];

    if (isset($parsed_url['port'])) {
        $url .= ':' . $parsed_url['port'];
    }

    $url .= $parsed_url['path'];

    if ($updated_query) {
        $url .= '?' . $updated_query;
    }

    return $url;
}

function get_order(string $parameter): string
{
    $order = isset($_GET[$parameter]) ? $_GET[$parameter] : 'asc';
    return ($order === 'asc') ? 'desc' : 'asc';
}

?>
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
        <th>
            <a href="<?= get_url('series_title', get_order('series_title')); ?>">
                Title
                <?= get_order('series_title'); ?>
            </a>
        </th>
        <th>
            <a href="<?= get_url('series_rating', get_order('series_rating')); ?>">
                Rating

                <?= get_order('series_rating'); ?>
            </a>
        </th>
        <th>Details</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = 'SELECT id, title, rating FROM series';

        if (isset($_GET['series_rating'])) {
            $order = $_GET['series_rating'];
            $query = $query . ' ORDER BY rating ' . $order;
        } elseif (isset($_GET['series_title'])) {
            $order = $_GET['series_title'];
            $query = $query . ' ORDER BY title ' . $order;
        }

        $query = $pdo->query($query);
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
        <th>
            <a href="<?= get_url('movies_title', get_order('movies_title')); ?>">
                Title
                <?= get_order('movies_title'); ?>
            </a>
        </th>
        <th>
            <a href="<?= get_url('movies_length_in_minutes', get_order('movies_length_in_minutes')); ?>">
                Duur
                <?= get_order('movies_length_in_minutes'); ?>
            </a>
        </th>
        <th>Details</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $query = 'SELECT id, title, length_in_minutes FROM movies';
        if (isset($_GET['movies_title'])) {
            $order = $_GET['movies_title'];
            $query = $query . ' ORDER BY title ' . $order;
        } elseif (isset($_GET['movies_length_in_minutes'])) {
            $order = $_GET['movies_length_in_minutes'];
            $query = $query . ' ORDER BY title ' . $order;
        }

        $query = $pdo->query($query);
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