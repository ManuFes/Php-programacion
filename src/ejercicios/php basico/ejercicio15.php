<?php
    $info = [
        [6, 7, 1985],
        [
            "cast" => [
                ["Mickey", "Brand"],
                ["Chunk", "Mouth", "Data"],
                ["Andy", "Stef"],
                "Fratelli" => ["Mama", "Francis", "Jack"]
            ]
        ],
        "us",
        [4 => 27, 2020, "topic" => "Reunited Apart"]
    ];

    #a.
    echo $info[1]["cast"]["Fratelli"][2]."<br>";

    # b.
    echo "Solución 1 - \$info[0][2]: " . $info[0][2] . "<br>";  

    echo "Solución 2 - \$info[3]: ";
    print_r($info[3]);  
    echo "<br>";

    if (isset($info[4])) {
        echo "Solución 3 - \$info[4][0]: " . $info[4][0] . "<br>";
    } else {
        echo "Solución 3 - \$info[4][0]: Error, el índice 4 no existe.<br>";
    }

    echo "Solución 4 - \$info[1]['cast'][0][0]: " . $info[1]["cast"][0][0] . "<br>";  
