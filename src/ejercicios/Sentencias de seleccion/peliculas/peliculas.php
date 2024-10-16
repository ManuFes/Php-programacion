<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    $peliculas = [
        [
            "titulo" => "Interestelar",
            "poster" => "https://th.bing.com/th/id/OIP.uiaj_IMaC7h3NoieAhcmVwHaLG?rs=1&pid=ImgDetMain",
            "plataforma" => "Paramount Pictures",
            "nota" => "8.6",
            "argumento" => "En un futuro distópico, un piloto de la NASA lidera una misión espacial para encontrar un nuevo hogar para la humanidad."
        ],

        [
            "titulo" => "Star wars III",
            "poster" => "https://th.bing.com/th/id/R.1a9a131c11319ddf0a1e23eff4f6da33?rik=tBn6dO8HN%2bcNVw&pid=ImgRaw&r=0",
            "plataforma" => "Disney+",
            "nota" => "7.5",
            "argumento" => "La caída de Anakin Skywalker y la transformación en Darth Vader."
        ],

        [
            "titulo" => "Jurassic Park",
            "poster" => "https://th.bing.com/th/id/R.61865068f1d677a57500be20814ba4f1?rik=E859lKeSx%2fgHYQ&pid=ImgRaw&r=0",
            "plataforma" => "Netflix",
            "nota" => "8.1",
            "argumento" => "Un parque de dinosaurios revive especies extintas, pero el caos estalla cuando los dinosaurios escapan."
        ],

        [
            "titulo" => "Pulp Fiction",
            "poster" => "https://image.tmdb.org/t/p/original/gSnbhR0vftfJ2U6KpGmR7WzZlVo.jpg",
            "plataforma" => "HBO Max",
            "nota" => "8.9",
            "argumento" => "Historias entrelazadas de crimen y redención en Los Ángeles."
        ],

        [
            "titulo" => "Kill Bill",
            "poster" => "https://th.bing.com/th/id/OIP.DZyDP0Hx0_7a_HSvlhFpAgHaLG?rs=1&pid=ImgDetMain",
            "plataforma" => "Amazon Prime Video",
            "nota" => "8.1",
            "argumento" => "Una asesina traicionada busca venganza contra su antiguo jefe y compañeros."
        ],

        [
            "titulo" => "Erase una vez en America",
            "poster" => "https://th.bing.com/th/id/R.704a0fd146068f24291495099d6bd4d7?rik=F5dwVsGWOau9YA&riu=http%3a%2f%2fwww.cineol.net%2fgaleria%2fcarteles%2fbigtmp_840.jpg&ehk=22rTL7WYKXIGiDDCMcj8RJGeXcsRXWtFn1%2fNMqcxj30%3d&risl=&pid=ImgRaw&r=0",
            "plataforma" => "Netflix",
            "nota" => "8.4",
            "argumento" => "La vida de un gánster en Nueva York a lo largo de varias décadas."
        ],

        [
            "titulo" => "El Padrino",
            "poster" => "https://i.pinimg.com/originals/e0/0c/65/e00c65ab6a7dacccd276c2fd434de8f5.jpg",
            "plataforma" => "Paramount+",
            "nota" => "9.2",
            "argumento" => "La historia de la familia Corleone y su imperio criminal en Nueva York."
        ],

        [
            "titulo" => "Scarface",
            "poster" => "https://www.vintagemovieposters.co.uk/wp-content/uploads/2023/02/IMG_0861-scaled.jpeg",
            "plataforma" => "Peacock",
            "nota" => "8.3",
            "argumento" => "El ascenso y caída de un inmigrante cubano en el mundo del narcotráfico de Miami."
        ],

        [
            "titulo" => "Avatar",
            "poster" => "https://th.bing.com/th/id/OIP.o9IM-gTFr_wkl11AnqIJdAHaLH?rs=1&pid=ImgDetMain",
            "plataforma" => "Disney+",
            "nota" => "7.8",
            "argumento" => "En el lejano mundo de Pandora, un humano se une a una especie alienígena para proteger su hogar."
        ],

        [
            "titulo" => "Avengers Endgame",
            "poster" => "https://th.bing.com/th/id/R.e955a1a4702bca3ea4da44898ee872dd?rik=y3Q%2bP3rY9f%2bAhA&riu=http%3a%2f%2fcdn.collider.com%2fwp-content%2fuploads%2f2019%2f03%2favengers-endgame-poster.jpg&ehk=UoQckDV4roR6H27tbcXLyQV5qobxoM7kNAwoXFgcWhk%3d&risl=&pid=ImgRaw&r=0",
            "plataforma" => "Disney+",
            "nota" => "8.4",
            "argumento" => "Los Vengadores se unen para enfrentarse a Thanos y revertir las consecuencias de su destrucción masiva."
        ]
    ];

    foreach ($peliculas as $pelicula) {
        echo "<div class='pelicula'>";
        echo "<img class='poster' src='{$pelicula['poster']}' alt='{$pelicula['titulo']} poster'>";
        echo "<div class='info'>";
        echo "<h2>{$pelicula['titulo']}</h2>";
        echo "<p class='plataforma'>Plataforma: {$pelicula['plataforma']}</p>";
        echo "<p class='nota'>Nota: {$pelicula['nota']}</p>";
        echo "<p>{$pelicula['argumento']}</p>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</body>

</html>