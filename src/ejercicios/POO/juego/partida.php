<?php
require_once 'personaje.php';
require_once 'objetivo.php';

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
    header('Location: index.php');
    exit();
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
    $objetivoSeleccionado = $_POST['objetivo'] ?? null;

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

            // Actualizar el objetivo en la sesión después del ataque
            $_SESSION['objetivos'][$objetivoSeleccionado] = $objetivo;

        } elseif ($botonPulsado === 'estadisticas_personaje') {
            $personaje->mostrarAtributos();
        } elseif ($botonPulsado === 'estadisticas_objetivo' && $objetivoSeleccionado !== null) {
            $objetivo = $_SESSION['objetivos'][$objetivoSeleccionado];
            $objetivo->mostrarAtributos();
        }
    }
}
