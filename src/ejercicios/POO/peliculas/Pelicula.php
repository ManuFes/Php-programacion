<?php

class Pelicula {
    private $titulo;
    private $poster;
    private $plataforma;
    private $nota;
    private $argumento;

    public function __construct($titulo, $poster, $plataforma, $nota, $argumento) {
        $this->titulo = $titulo;
        $this->poster = $poster;
        $this->plataforma = $plataforma;
        $this->nota = $nota;
        $this->argumento = $argumento;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getPoster() {
        return $this->poster;
    }

    public function getPlataforma() {
        return $this->plataforma;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getArgumento() {
        return $this->argumento;
    }
}

?>
