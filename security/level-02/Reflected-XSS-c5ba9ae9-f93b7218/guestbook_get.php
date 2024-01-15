<?php

include "database.php";
$conn;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
} catch (Exception $e) {
    die("Failed to open database connection, did you start it and configure the credentials properly?");
}
?>
<html>
<head>
    <title>Leaky-Guestbook</title>
    <style>
        body {
            width: 100%;
        }

        .body-container {
            background-color: aliceblue;
            width: 200px;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
            padding-left: 100px;
            padding-right: 100px;
        }

        .heading {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="body-container">
    <h1 class="heading">Gastenboek 'De lekkage'</h1>
    <form action="guestbook_get.php">
        Email: <input type="email" name="email"><br/>
        <input type="hidden" value="red" name="color">
        Bericht: <textarea name="text" minlength="4"></textarea><br/>
        <?php if (userIsAdmin($conn)) {
            echo "<input type\"hidden\" name=\"admin\" value=" . $_COOKIE['admin'] . "\">";
        } ?>
        <input type="submit">
    </form>
    <hr/>
    <?php
    if (isset($_GET['email']) && isset($_GET['text'])) {
        print "<div style=\"color: red\">Email: " . $_GET['email'];
        print ": " . $_GET['text'] . "</div><br/>";
    }


    $result = $conn->query("SELECT `email`, `text`, `color`, `admin` FROM `entries`");
    foreach ($result as $row) {
        print "<div style=\"color: " . $row['color'] . "\">Email: " . $row['email'];
        if ($row['admin']) {
            print '&#9812;';
        }
        print ": " . $row['text'] . "</div><br/>";
    }


    function userIsAdmin($conn)
    {
        if (isset($_COOKIE['admin'])) {
            $adminCookie = $_COOKIE['admin'];

            $result = $conn->query("SELECT cookie FROM `admin_cookies`");

            foreach ($result as $row) {
                if ($adminCookie === $row['cookie']) {
                    return true;
                }
            }
        }
        return false;
    }

    ?>
</div>
</body>
</html>