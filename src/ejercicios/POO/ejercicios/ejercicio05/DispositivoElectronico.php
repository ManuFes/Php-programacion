<?php
abstract class DispositivoElectronico {
    abstract public function encender();
}

class Telefono extends DispositivoElectronico {
    public function encender() {
        echo "El teléfono se está encendiendo.<br>";
    }
}

class Computadora extends DispositivoElectronico {
    public function encender() {
        echo "La computadora se está encendiendo.<br>";
    }
}

$telefono = new Telefono();
$telefono->encender();

$computadora = new Computadora();
$computadora->encender();
