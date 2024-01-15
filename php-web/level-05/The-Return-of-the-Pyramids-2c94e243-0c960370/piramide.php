<!DOCTYPE html>
<html>
<head>
    <title>Piramide</title>
    <style>
        .block {
            width: 50px;
            height: 50px;
            margin: 0;
            background-color: black;
            display: inline-block;
        }

        .wrapper {
            margin-top: -4px;
        }
    </style>
</head>
<body>
<?php
$blockCount = 10;
for ($row = 1; $row <= $blockCount; $row++) :
    echo '<div class="wrapper">';
    for ($col = 1; $col <= $row; $col++) {
        echo '<div class="block"></div>';
    }
    echo '</div>';
endfor; ?>
</body>
</html>
