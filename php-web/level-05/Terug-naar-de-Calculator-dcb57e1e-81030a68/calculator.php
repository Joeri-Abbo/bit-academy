<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <style>
        .bold {
            font-weight: bold;
        }

        .mb-2 {
            margin-bottom: 12px;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
<h1>Calculator</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];

    if (!is_numeric($number1) || !is_numeric($number2)) {
        echo '<p class="error">Beide getallen moeten numeriek zijn.</p>';
    } else {
        $number1 = floatval($number1);
        $number2 = floatval($number2);
        switch ($operation) {
            case 'Add':
                $result = $number1 + $number2;
                break;
            case 'Subtract':
                $result = $number1 - $number2;
                break;
            case 'Multiply':
                $result = $number1 * $number2;
                break;
            case 'Divide':
                if ($number2 == 0) {
                    echo '<p class="error">Het tweede getal mag niet nul zijn bij delen.</p>';
                } else {
                    $result = $number1 / $number2;
                }
                break;
            case 'Modulo':
                if ($number2 == 0) {
                    echo '<p class="error">Het tweede getal mag niet nul zijn bij de modulo-operatie.</p>';
                } else {
                    $result = fmod($number1, $number2);
                }
                break;
            default:
                echo '<p class="error">Ongeldige bewerking geselecteerd.</p>';
                break;
        }
    }
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="mb-2">
        <label for="number1" class="bold">Number 1</label>
        <input type="number" step="any" name="number1" value="<?php echo isset($_POST['number1']) ? $_POST['number1'] : ''; ?>">
    </div>
    <div class="mb-2">
        <label for="number2" class="bold">Number 2</label>
        <input type="number" step="any" name="number2" value="<?php echo isset($_POST['number2']) ? $_POST['number2'] : ''; ?>">
    </div>
    <?php
    if (isset($operation)) {
        echo '<p><span class="bold">Operation:</span> ' . $operation . '</p>';
    }
    ?>
    <?php
    if (isset($result)) {
        echo '<p><span class="bold">Resultaat:</span> ' . $result . '</p>';
    }
    ?>
    <input type="submit" name="operation" value="Add">
    <input type="submit" name="operation" value="Subtract">
    <input type="submit" name="operation" value="Multiply">
    <input type="submit" name="operation" value="Divide">
    <input type="submit" name="operation" value="Modulo">
</form>

</body>
</html>
