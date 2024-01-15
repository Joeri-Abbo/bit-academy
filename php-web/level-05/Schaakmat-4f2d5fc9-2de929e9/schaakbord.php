<!DOCTYPE html>
<html>
<head>
    <title>Schaakbord</title>
    <style>
        .chessboard {
            width: 400px;
            height: 400px;
            display: flex;
            flex-wrap: wrap;
        }

        .tile {
            width: 50px;
            height: 50px;
        }

        .white {
            background-color: white;
        }

        .black {
            background-color: #808080;
        }
    </style>
</head>
<body>
<div class="chessboard">
    <?php
    for ($row = 1; $row <= 8; $row++) {
        for ($col = 1; $col <= 8; $col++) {
            $color = ($row + $col) % 2 == 0 ? 'white' : 'black';
            echo '<div class="tile ' . $color . '"></div>';
        }
    }
    ?>
</div>
</body>
</html>
