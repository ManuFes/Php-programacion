<?php

interface Luchador
{
    public function pelea(Persona $otraPersona);
}

class Persona implements Luchador
{
    private $nombre;
    private $edad;

    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function pelea(Persona $otraPersona)
    {
        if ($this->edad > $otraPersona->getEdad()) {
            return $this->nombre . " gana la pelea contra " . $otraPersona->getNombre();
        } elseif ($this->edad < $otraPersona->getEdad()) {
            return $otraPersona->getNombre() . " gana la pelea contra " . $this->nombre;
        } else {
            return "La pelea entre " . $this->nombre . " y " . $otraPersona->getNombre() . " termina en empate";
        }
    }
}
