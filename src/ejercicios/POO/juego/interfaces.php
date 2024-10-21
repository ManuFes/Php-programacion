<?php
session_start(); // Iniciar sesión para guardar los datos

// Interfaz Batalla con la función atacar()
interface Batalla {
    public function atacar($objetivo);
}

// Interfaz Mago para invocar
interface MagoInterface {
    public function invocar();
}

// Clase base Personaje con atributos heredables
class Personaje {
    protected $vida;
    protected $daño;
    protected $estamina;
    protected $nombre;

    public function __construct($nombre, $vida, $daño, $estamina) {
        $this->nombre = $nombre;
        $this->vida = $vida;
        $this->daño = $daño;
        $this->estamina = $estamina;
    }

    public function mostrarAtributos() {
        echo "Personaje: $this->nombre<br>";
        echo "Vida: $this->vida<br>";
        echo "Daño: $this->daño<br>";
        echo "Estamina: $this->estamina<br>";
    }

    public function calcularDaño() {
        $dado = rand(1, 6);
        $multiplicador = $dado / 6; // Se calcula el porcentaje basado en el dado
        $dañoReal = $this->daño * $multiplicador;
        echo "El dado ha salido: $dado<br>";
        echo "Daño real causado: " . round($dañoReal, 2) . "<br>";
        return $dañoReal;
    }

    public function atacar($objetivo) {
        $daño = $this->calcularDaño();
        $objetivo->recibirDaño($daño, $this->nombre);
    }
}

// Clase Paladín que extiende de Personaje e implementa Batalla
class Paladin extends Personaje implements Batalla {
    public function __construct() {
        parent::__construct('Paladín', 150, 30, 100);
    }
}

// Clase Mago que extiende de Personaje, implementa Batalla y MagoInterface
class Mago extends Personaje implements Batalla, MagoInterface {
    public function __construct() {
        parent::__construct('Mago', 100, 40, 80);
    }

    public function invocar() {
        echo "Mago invoca Dragon de fuego<br>";
    }
}

// Clase Caballero que extiende de Personaje e implementa Batalla
class Caballero extends Personaje implements Batalla {
    public function __construct() {
        parent::__construct('Caballero', 200, 25, 120);
    }
}

// Clase Objetivo con atributos de vida y función para recibir daño
class Objetivo {
    public $nombre;
    public $vida;

    public function __construct($nombre, $vida) {
        $this->nombre = $nombre;
        $this->vida = $vida;
    }

    public function mostrarAtributos() {
        echo "Objetivo: $this->nombre<br>";
        echo "Vida restante: $this->vida<br>";
    }

    public function calcularDefensa() {
        $dado = rand(1, 6);
        $reduccion = $dado / 6; // Se calcula el porcentaje de reducción de daño
        echo "El dado de defensa del $this->nombre ha salido: $dado<br>";
        echo "Reducción de daño: " . round($reduccion * 100, 2) . "%<br>";
        return $reduccion;
    }

    public function recibirDaño($daño, $nombreAtacante) {
        $reduccion = $this->calcularDefensa();
        $dañoReducido = $daño * (1 - $reduccion); // Daño final después de la reducción
        $this->vida -= $dañoReducido;

        if ($this->vida <= 0) {
            echo "$nombreAtacante ha derrotado al $this->nombre<br>";
            $this->vida = 0;
        } else {
            echo "$this->nombre ha recibido $dañoReducido de daño después de la defensa<br>";
            $this->mostrarAtributos();
        }
    }
}

// Función para inicializar los personajes y objetivos
function inicializarPartida() {
    $_SESSION['objetivos'] = [
        'Goblin' => new Objetivo('Goblin', 50),
        'Troll' => new Objetivo('Troll', 100),
        'Gigante' => new Objetivo('Gigante', 150),
    ];

    unset($_SESSION['ultimo_personaje']);
    unset($_SESSION['ultimo_objetivo']);
}

// Reiniciar la partida si se presiona el botón de reinicio
if (isset($_POST['boton']) && $_POST['boton'] === 'reiniciar') {
    inicializarPartida();
    echo "Partida reiniciada<br>";
}

// Inicializar la partida si aún no se ha hecho
if (!isset($_SESSION['objetivos'])) {
    inicializarPartida();
}

$personaje = null;

// Procesar la selección del personaje y la acción
if (isset($_POST['personaje']) && isset($_POST['boton'])) {
    $personajeSeleccionado = $_POST['personaje'];
    $botonPulsado = $_POST['boton'];
    $objetivoSeleccionado = $_POST['objetivo'] ?? null; // Verificar si el objetivo está disponible

    // Guardar los valores seleccionados para no perderlos tras enviar el formulario
    $_SESSION['ultimo_personaje'] = $personajeSeleccionado;
    $_SESSION['ultimo_objetivo'] = $objetivoSeleccionado;

    // Crear instancia del personaje seleccionado
    switch ($personajeSeleccionado) {
        case 'Paladin':
            $personaje = new Paladin();
            break;
        case 'Mago':
            $personaje = new Mago();
            break;
        case 'Caballero':
            $personaje = new Caballero();
            break;
        default:
            echo "Error: Personaje no válido.<br>";
            break;
    }

    // Ejecutar acción según el botón pulsado
    if ($personaje !== null) {
        if ($botonPulsado === 'accion' && $objetivoSeleccionado !== null) {
            $objetivo = $_SESSION['objetivos'][$objetivoSeleccionado];
            $personaje->atacar($objetivo);
        } elseif ($botonPulsado === 'estadisticas_personaje') {
            $personaje->mostrarAtributos();
        } elseif ($botonPulsado === 'estadisticas_objetivo' && $objetivoSeleccionado !== null) {
            $objetivo = $_SESSION['objetivos'][$objetivoSeleccionado];
            $objetivo->mostrarAtributos();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje Selector</title>
    <script>
        function actualizarAccion() {
            const personajeSeleccionado = document.getElementById("personaje").value;
            const accionesDiv = document.getElementById("acciones");

            // Limpiar el div de acciones
            accionesDiv.innerHTML = '';

            if (personajeSeleccionado === 'Mago') {
                // Si el personaje es Mago, mostramos las opciones de Atacar o Invocar
                accionesDiv.innerHTML = `
                    <label for="accion">Acción:</label>
                    <select name="accion" id="accion">
                        <option value="atacar">Atacar</option>
                        <option value="invocar">Invocar</option>
                    </select>
                `;
            } else {
                // Para cualquier otro personaje, solo mostramos la opción de Atacar
                accionesDiv.innerHTML = `
                    <input type="hidden" name="accion" value="atacar">
                `;
            }
        }
    </script>
</head>

<body>
    <h1>Selecciona un Personaje</h1>
    <form method="POST">
        <label for="personaje">Personaje:</label>
        <select name="personaje" id="personaje" onchange="actualizarAccion()">
            <option value="Paladin" <?= isset($_SESSION['ultimo_personaje']) && $_SESSION['ultimo_personaje'] == 'Paladin' ? 'selected' : '' ?>>Paladín</option>
            <option value="Mago" <?= isset($_SESSION['ultimo_personaje']) && $_SESSION['ultimo_personaje'] == 'Mago' ? 'selected' : '' ?>>Mago</option>
            <option value="Caballero" <?= isset($_SESSION['ultimo_personaje']) && $_SESSION['ultimo_personaje'] == 'Caballero' ? 'selected' : '' ?>>Caballero</option>
        </select>
        <br><br>

        <div id="acciones">
            <!-- Se actualizará dinámicamente según la selección -->
            <input type="hidden" name="accion" value="atacar">
        </div>

        <br>
        <label for="objetivo">Objetivo:</label>
        <select name="objetivo" id="objetivo">
            <option value="Goblin" <?= isset($_SESSION['ultimo_objetivo']) && $_SESSION['ultimo_objetivo'] == 'Goblin' ? 'selected' : '' ?>>Goblin</option>
            <option value="Troll" <?= isset($_SESSION['ultimo_objetivo']) && $_SESSION['ultimo_objetivo'] == 'Troll' ? 'selected' : '' ?>>Troll</option>
            <option value="Gigante" <?= isset($_SESSION['ultimo_objetivo']) && $_SESSION['ultimo_objetivo'] == 'Gigante' ? 'selected' : '' ?>>Gigante</option>
        </select>
        <br><br>

        <!-- Botón para realizar la acción -->
        <button type="submit" name="boton" value="accion">Realizar Acción</button>

        <!-- Botón para mostrar las estadísticas del personaje -->
        <button type="submit" name="boton" value="estadisticas_personaje">Mostrar Estadísticas del Personaje</button>

        <!-- Botón para mostrar las estadísticas del objetivo -->
        <button type="submit" name="boton" value="estadisticas_objetivo">Mostrar Estadísticas del Objetivo</button>

        <!-- Botón para reiniciar la partida -->
        <button type="submit" name="boton" value="reiniciar">Reiniciar Partida</button>
    </form>
</body>

</html>
