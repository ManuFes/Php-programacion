<?php

class Biblioteca {
    private $peliculas;

    public function __construct() {
        // Inicializar el array de películas
        $this->peliculas = [
            [
                "titulo" => "Interestellar",
                "poster" => "img/Interestellar.jpg",
                "plataforma" => "Paramount Pictures",
                "nota" => "8.6",
                "argumento" => "En un futuro distópico, un piloto de la NASA lidera una misión espacial para encontrar un nuevo hogar para la humanidad."
            ],
            [
                "titulo" => "Star wars III",
                "poster" => "img/Star Wars III.jpg",
                "plataforma" => "Disney+",
                "nota" => "7.5",
                "argumento" => "La caída de Anakin Skywalker y la transformación en Darth Vader."
            ],
            [
                "titulo" => "Jurassic Park",
                "poster" => "img/Jurassic Park.jpg",
                "plataforma" => "Netflix",
                "nota" => "8.1",
                "argumento" => "Un parque de dinosaurios revive especies extintas, pero el caos estalla cuando los dinosaurios escapan."
            ],
            [
                "titulo" => "Pulp Fiction",
                "poster" => "img/Pulp Fiction.jpg",
                "plataforma" => "HBO Max",
                "nota" => "8.9",
                "argumento" => "Historias entrelazadas de crimen y redención en Los Ángeles."
            ],
            [
                "titulo" => "Kill Bill",
                "poster" => "img/Kill Bill.jpg",
                "plataforma" => "Amazon Prime Video",
                "nota" => "8.1",
                "argumento" => "Una asesina traicionada busca venganza contra su antiguo jefe y compañeros."
            ],
            [
                "titulo" => "Erase una vez en America",
                "poster" => "img/Erase una vez en america.jpg",
                "plataforma" => "Netflix",
                "nota" => "8.4",
                "argumento" => "La vida de un gánster en Nueva York a lo largo de varias décadas."
            ],
            [
                "titulo" => "El Padrino",
                "poster" => "img/El Padrino.jpg",
                "plataforma" => "Paramount+",
                "nota" => "9.2",
                "argumento" => "La historia de la familia Corleone y su imperio criminal en Nueva York."
            ],
            [
                "titulo" => "Scarface",
                "poster" => "img/Scarface.jpg",
                "plataforma" => "Peacock",
                "nota" => "8.3",
                "argumento" => "El ascenso y caída de un inmigrante cubano en el mundo del narcotráfico de Miami."
            ],
            [
                "titulo" => "Avatar",
                "poster" => "img/Avatar.jpg",
                "plataforma" => "Disney+",
                "nota" => "7.8",
                "argumento" => "En el lejano mundo de Pandora, un humano se une a una especie alienígena para proteger su hogar."
            ],
            [
                "titulo" => "Avengers Endgame",
                "poster" => "img/Avengers Endgame.jpg",
                "plataforma" => "Disney+",
                "nota" => "8.4",
                "argumento" => "Los Vengadores se unen para enfrentarse a Thanos y revertir las consecuencias de su destrucción masiva."
            ]
        ];
    }

    public function agregarPelicula($pelicula) {
        $this->peliculas[] = $pelicula;
    }

    public function buscarPelicula($titulo) {
        foreach ($this->peliculas as $pelicula) {
            if (stripos($pelicula['titulo'], $titulo) !== false) {
                return $pelicula;
            }
        }
        return null;
    }
}

?>
