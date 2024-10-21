<?php

// Interfaz Batalla, para asegurar que todas las clases tienen el método atacar()
interface Batalla {
    public function atacar($objetivo);
}

// Clase base Personaje
class Personaje {
    public $nombre;
    public $vida;
    public $daño;
    public $estamina;

    public function __construct($nombre, $vida, $daño, $estamina) {
        $this->nombre = $nombre;
        $this->vida = $vida;
        $this->daño = $daño;
        $this->estamina = $estamina;
    }

    // Mostrar atributos del personaje
    public function mostrarAtributos() {
        echo "Personaje: $this->nombre<br>";
        echo "Vida: $this->vida<br>";
        echo "Daño: $this->daño<br>";
        echo "Estamina: $this->estamina<br>";
    }

    // Calcular daño (simulación de tirar un dado)
    public function calcularDaño() {
        $dado = rand(1, 6);  // Tirada del dado
        $multiplicador = $dado / 6; // Se calcula el porcentaje basado en el dado
        $dañoReal = $this->daño * $multiplicador;

        // Mostrar la imagen correspondiente al dado
        echo "Tirada del dado: <img src='img/{$dado}.jpg' alt='Dado {$dado}'><br>";
        echo "Daño real causado: " . round($dañoReal, 2) . "<br>";

        return $dañoReal;
    }
}

// Clase Paladín, extiende Personaje e implementa Batalla
class Paladin extends Personaje implements Batalla {
    public function __construct() {
        parent::__construct('Paladín', 100, 30, 50); // Definimos los atributos
    }

    // Implementar el método atacar
    public function atacar($objetivo) {
        echo "Paladín ataca al {$objetivo->nombre}<br>";
        $daño = $this->calcularDaño();
        $objetivo->recibirDaño($daño, $this->nombre);
    }
}

// Clase Mago, extiende Personaje e implementa Batalla
class Mago extends Personaje implements Batalla {
    public function __construct() {
        parent::__construct('Mago', 80, 40, 60); // Definimos los atributos
    }

    // Implementar el método atacar
    public function atacar($objetivo) {
        echo "Mago ataca al {$objetivo->nombre}<br>";
        $daño = $this->calcularDaño();
        $objetivo->recibirDaño($daño, $this->nombre);
    }

    // Método adicional para invocar (solo Mago tiene este método)
    public function invocar() {
        echo "Mago invoca un dragón de fuego.<br>";
    }
}

// Clase Caballero, extiende Personaje e implementa Batalla
class Caballero extends Personaje implements Batalla {
    public function __construct() {
        parent::__construct('Caballero', 120, 35, 40); // Definimos los atributos
    }

    // Implementar el método atacar
    public function atacar($objetivo) {
        echo "Caballero ataca al {$objetivo->nombre}<br>";
        $daño = $this->calcularDaño();
        $objetivo->recibirDaño($daño, $this->nombre);
    }
}

// Clase Objetivo (Goblin, Troll, Gigante)
class Objetivo {
    public $nombre;
    public $vida;

    public function __construct($nombre, $vida) {
        $this->nombre = $nombre;
        $this->vida = $vida;
    }

    // Mostrar atributos del objetivo
    public function mostrarAtributos() {
        echo "Objetivo: $this->nombre<br>";
        echo "Vida restante: $this->vida<br>";
    }

    // Calcular defensa del objetivo
    public function calcularDefensa() {
        $dado = rand(1, 6);  // Tirada del dado de defensa
        $reduccion = $dado / 6; // Se calcula el porcentaje de reducción de daño

        // Mostrar la imagen correspondiente al dado de defensa
        echo "Tirada del dado de defensa: <img src='img/{$dado}.jpg' alt='Dado de defensa {$dado}'><br>";
        echo "Reducción de daño: " . round($reduccion * 100, 2) . "%<br>";

        return $reduccion;
    }

    // Método para recibir daño
    public function recibirDaño($daño, $nombreAtacante) {
        $reduccion = $this->calcularDefensa();
        $dañoReducido = $daño * (1 - $reduccion); // Daño final después de la reducción
        $this->vida -= $dañoReducido;

        if ($this->vida <= 0) {
            echo "$nombreAtacante ha derrotado al {$this->nombre}<br>";
            $this->vida = 0; // Establecer la vida en 0 para evitar números negativos
        } else {
            echo "{$this->nombre} ha recibido $dañoReducido de daño después de la defensa<br>";
            $this->mostrarAtributos();
        }
    }
}
