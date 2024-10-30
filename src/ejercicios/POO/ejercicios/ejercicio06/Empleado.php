<?php
class Empleado {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function trabajar() {
        return "El empleado está trabajando.";
    }

    public function saludar() {
        return "Hola, {$this->nombre}. Bienvenido al trabajo.";
    }

    public function despedir() {
        return "Adiós, {$this->nombre}. Hasta luego.";
    }
}

class Desarrollador extends Empleado {
    
    public function trabajar() {
        return "El desarrollador {$this->nombre} está programando.";
    }
}

function mostrarEnTabla($empleados) {
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Acción</th></tr>";
    foreach ($empleados as $empleado) {
        echo "<tr><td>{$empleado->getNombre()}</td><td>{$empleado->saludar()}</td></tr>";
        echo "<tr><td>{$empleado->getNombre()}</td><td>{$empleado->trabajar()}</td></tr>";
        echo "<tr><td>{$empleado->getNombre()}</td><td>{$empleado->despedir()}</td></tr>";
    }
    echo "</table>";
}

$desarrollador1 = new Desarrollador("Juan");
$desarrollador2 = new Desarrollador("Ana");
$empleado1 = new Empleado("Carlos");

$empleados = [$desarrollador1, $desarrollador2, $empleado1];
mostrarEnTabla($empleados);
