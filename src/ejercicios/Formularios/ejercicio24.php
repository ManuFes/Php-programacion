<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Bidimensional</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            font-weight: bold;
        }
        .blue {
            color: blue;
        }
        .green {
            color: green;
        }
        .black {
            color: black;
        }
    </style>
</head>
<body>
    <?php
        $numeros = range(100, 999);
        shuffle($numeros);
        $array = array_chunk(array_slice($numeros, 0, 54), 9);

        $min = 999;
        $minPos = [0, 0];
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($array[$i][$j] < $min) {
                    $min = $array[$i][$j];
                    $minPos = [$i, $j];
                }
            }
        }

        echo "<h2>Array Bidimensional</h2>";
        echo "<table>";
        for ($i = 0; $i < 6; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 9; $j++) {
                $colorClass = "black";

                if ($array[$i][$j] == $min) {
                    $colorClass = "blue";
                } 
                elseif ($i - $j == $minPos[0] - $minPos[1] || $i + $j == $minPos[0] + $minPos[1]) {
                    $colorClass = "green";
                }

                echo "<td class='$colorClass'>{$array[$i][$j]}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
