<?php
    # Escribe un script PHP donde definas un array multidimensional llamado $clases que contenga dos arrays, uno con los nombres de los profesores y otro con los cursos que importen. Los profesores son Pedro Perez y Gema Gomez, y los cursos son Biologia y Quimica
    $clases = array(
        "profesores" => array("Pedro Perez", "Gema Gomez"),
        "cursos" => array("Biología", "Química")
    );
    
    echo "<p><strong>Profesores:</strong></p>";
        echo "<ul>";
        echo "<li>" . $clases['profesores'][0] . "</li>";
        echo "<li>" . $clases['profesores'][1] . "</li>";
        echo "</ul>";

        echo "<p><strong>Cursos:</strong></p>";
        echo "<ul>";
        echo "<li>" . $clases['cursos'][0] . "</li>";
        echo "<li>" . $clases['cursos'][1] . "</li>";
        echo "</ul>";