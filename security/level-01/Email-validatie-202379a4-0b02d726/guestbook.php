<?php

session_start();
include "database.php";
$conn;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Failed to open database connection, did you start it and configure the credentials properly?");
}

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
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
            margin-left: auto;
            margin-right: auto;
            padding-left: 100px;
            padding-right: 100px;
            padding-bottom: 20px;
        }

        .heading {
            text-align: center;
        }

        .disclosure-notice {
            color: lightgray;
        }
    </style>
</head>
<body>
<div class="body-container">
    <h1 class="heading">Gastenboek 'De lekkage'</h1>
    <form action="guestbook.php" method="post">
        Email: <input type="text" name="email"><br/> <!-- Veranderd type naar "text" -->
        <input type="hidden" value="red" name="color">
        Bericht: <textarea name="text" minlength="4"></textarea><br/>
        <?php if (userIsAdmin($conn)) {
            echo "Kleur: <input type=\"text\" name=\"color\" value=\"" . $_POST['color'] . "\"><br/>";
        } ?>
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="submit">
    </form>
    <hr/>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $text = $_POST['text'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $color = $_POST['color'];

        // Controleer of de gebruiker admin is voordat de kleur wordt geaccepteerd
        if (!userIsAdmin($conn)) {
            $color = 'red';
        }

        // Valideer het e-mailadres
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Ongeldig e-mailadres!";
        } else {
            $stmt = $conn->prepare("INSERT INTO `entries`(`email`, `color`, `admin`, `text`) 
                                        VALUES (:email, :color, :admin, :text)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':admin', $admin);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        }
    }


    $stmt = $conn->prepare("SELECT `email`, `text`, `color`, `admin` FROM `entries`");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

            $stmt = $conn->prepare("SELECT cookie FROM `admin_cookies`");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                if ($adminCookie === $row['cookie']) {
                    return true;
                }
            }
        }
        return false;
    }

    ?>
    <hr/>
    <div class="disclosure-notice">
        <p>
            Hierbij krijgt iedereen expliciete toestemming om dit Gastenboek zelf te gebruiken voor welke doeleinden dan
            ook.
        </p>
        <p>
            Onthoud dat je voor andere websites altijd je aan de principes van
            <a href="https://en.wikipedia.org/wiki/Responsible_disclosure" target="_blank" style="color: lightgray;">
                Responsible Disclosure
            </a> wilt houden.
        </p>
    </div>
</div>
</body>
</html>
