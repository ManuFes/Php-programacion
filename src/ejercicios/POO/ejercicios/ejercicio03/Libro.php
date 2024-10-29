<?php
class Libro{
    public function __construct(public readonly string $titulo,public string $autor) {}
}

$libro = new Libro("La historia de las drogas","Antonio Mota");

echo "Titulo: " . $libro->titulo , "<br>";
echo "Autor: " . $libro->autor , "<br>";