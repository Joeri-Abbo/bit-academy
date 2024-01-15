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

// Genereer en sla het CSRF-token op in de sessie
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['csrf_token'];

// Controleer of het CSRF-token overeenkomt met het token in de sessie
function validateCSRFToken($token)
{
    return isset($_SESSION['csrf_token']) && $token === $_SESSION['csrf_token'];
}

// Check of het formulier is ingediend via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Controleer of het CSRF-token geldig is
    if (validateCSRFToken($_POST['csrf_token'])) {
        $email = $_POST['email'];
        $text = $_POST['text'];
        $admin = userIsAdmin($conn) ? 1 : 0; // Haal adminstatus uit de database
        $color = $_POST['color'];

        // Valideer en ontsnap de ingediende tekst
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

        $stmt = $conn->prepare("INSERT INTO `entries`(`email`, `color`, `admin`, `text`) 
                                        VALUES (:email, :color, :admin, :text)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':admin', $admin);
        $stmt->bindParam(':text', $text);
        $stmt->execute();
    } else {
        // CSRF-token is niet geldig, verwerk de foutmelding
        die("Invalid CSRF token");
    }
}

$stmt = $conn->prepare("SELECT `email`, `text`, `color`, `admin` FROM `entries`");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    print "<div style=\"color: " . htmlspecialchars($row['color'], ENT_QUOTES, 'UTF-8') . "\">Email: " . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
    if ($row['admin']) {
        print '&#9812;';
    }
    print ": " . htmlspecialchars($row['text'], ENT_QUOTES, 'UTF-8') . "</div><br/>";
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

<!-- Verwijder het fake-formulier -->
<script>
    // Verwijder het fake-formulier na het laden van de pagina
    window.addEventListener('DOMContentLoaded', function () {
        var fakeForm = document.getElementById('fake-form');
        if (fakeForm) {
            fakeForm.parentNode.removeChild(fakeForm);
        }
    });
</script>
</body>
</html>
```