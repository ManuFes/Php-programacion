<?php 
class Persona{
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function mostrarInformacion(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
    }
}

$persona = new Persona("Juan", 30);

$persona -> mostrarInformacion();