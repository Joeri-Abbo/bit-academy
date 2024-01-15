<!DOCTYPE html>
<html>
<head>
    <title>Formulier</title>
</head>
<body>
<?php
$email = isset($_POST['email']) ? $_POST['email'] : "";

if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "E-mailadres is geldig!";
} else {
    echo "E-mailadres is ongeldig!";
}
?>

<form action="form.php" method="post">
    <input type="text" name="email" placeholder="email">
    <input type="submit" name="submit" value="verstuur">
</form>
</body>
</html>