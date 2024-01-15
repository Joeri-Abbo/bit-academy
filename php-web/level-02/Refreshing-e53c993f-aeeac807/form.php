<?php

$email = isset($_POST['email']) ? $_POST['email'] : "";

if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: success.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulier</title>
</head>
<body>
<p>
    Voer een email in
</p>
<form action="form.php" method="post">
    Meld je aan voor onze nieuwsbrief
    <input type="text" name="email" placeholder="Voer uw e-mailadres in">
    <input type="submit" name="submit" value="Aanmelden">
</form>
</body>
</html>