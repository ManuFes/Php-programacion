<?php
require_once 'personaje.php';
require_once 'objetivo.php';

session_start(); // Iniciar la sesión después de cargar las clases

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

// Inicializar la partida si aún no se ha hecho
if (!isset($_SESSION['objetivos'])) {
    inicializarPartida();
}

// Variables para mostrar estadísticas
$mostrarEstadisticasPersonaje = false;
$mostrarEstadisticasObjetivo = false;
$objetivo = null;
$nombrePersonaje = "Personaje"; // Valor por defecto
$nombreObjetivo = "Objetivo";   // Valor por defecto

// Procesar la selección del personaje y la acción
if (isset($_POST['personaje']) && isset($_POST['boton'])) {
    $personajeSeleccionado = $_POST['personaje'];
    $botonPulsado = $_POST['boton'];
    $objetivoSeleccionado = $_POST['objetivo'] ?? null;

    // Guardar los valores seleccionados para no perderlos tras enviar el formulario
    $_SESSION['ultimo_personaje'] = $personajeSeleccionado;
    $_SESSION['ultimo_objetivo'] = $objetivoSeleccionado;

    // Asignar el nombre del personaje seleccionado
    switch ($personajeSeleccionado) {
        case 'Paladin':
            $personaje = new Paladin();
            $nombrePersonaje = 'Paladín';
            break;
        case 'Mago':
            $personaje = new Mago();
            $nombrePersonaje = 'Mago';
            break;
        case 'Caballero':
            $personaje = new Caballero();
            $nombrePersonaje = 'Caballero';
            break;
        default:
            echo "Error: Personaje no válido.<br>";
            break;
    }

    // Asignar el nombre del objetivo seleccionado
    if ($objetivoSeleccionado !== null) {
        $objetivo = $_SESSION['objetivos'][$objetivoSeleccionado];
        $nombreObjetivo = $objetivo->nombre;
    }

    // No hacer ninguna acción si el botón "Seleccionar" fue pulsado
    if ($botonPulsado === 'seleccionar') {
        // Simplemente recargar la página con las nuevas selecciones y actualizar los nombres en los botones.
    } else {
        // Ejecutar acción según el botón pulsado
        if ($personaje !== null) {
            if ($botonPulsado === 'accion' && $objetivoSeleccionado !== null) {
                $personaje->atacar($objetivo);

                // Actualizar el objetivo en la sesión después del ataque
                $_SESSION['objetivos'][$objetivoSeleccionado] = $objetivo;

            } elseif ($botonPulsado === 'estadisticas_personaje') {
                $mostrarEstadisticasPersonaje = true;
            } elseif ($botonPulsado === 'estadisticas_objetivo' && $objetivoSeleccionado !== null) {
                // Cargar el objetivo desde la sesión y mostrar sus estadísticas
                $mostrarEstadisticasObjetivo = true;
            } elseif ($botonPulsado === 'reiniciar') {
                inicializarPartida();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Personajes</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Estilos para hacer que las imágenes sean seleccionables */
        .character-selection img, .objective-selection img {
            width: 150px;
            height: auto;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border 0.3s;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked + img {
            border: 2px solid #00f;
        }
    </style>
</head>

<body>
    <h1>Selecciona un Personaje</h1>
    <form method="POST" action="">
        <!-- Selección de personajes -->
        <div class="character-selection">
            <label>
                <input type="radio" name="personaje" value="Paladin" <?= isset($_SESSION['ultimo_personaje']) && $_SESSION['ultimo_personaje'] == 'Paladin' ? 'checked' : '' ?>>
                <img src="img/paladin.jpg" alt="Paladín">
            </label>
            <label>
                <input type="radio" name="personaje" value="Mago" <?= isset($_SESSION['ultimo_personaje']) && $_SESSION['ultimo_personaje'] == 'Mago' ? 'checked' : '' ?>>
                <img src="img/mago.jpg" alt="Mago">
            </label>
            <label>
                <input type="radio" name="personaje" value="Caballero" <?= isset($_SESSION['ultimo_personaje']) && $_SESSION['ultimo_personaje'] == 'Caballero' ? 'checked' : '' ?>>
                <img src="img/caballero.jpg" alt="Caballero">
            </label>
        </div>
        <br><br>

        <h2>Selecciona un Objetivo</h2>
        <!-- Selección de objetivos -->
        <div class="objective-selection">
            <label>
                <input type="radio" name="objetivo" value="Goblin" <?= isset($_SESSION['ultimo_objetivo']) && $_SESSION['ultimo_objetivo'] == 'Goblin' ? 'checked' : '' ?>>
                <img src="img/goblin.jpg" alt="Goblin">
            </label>
            <label>
                <input type="radio" name="objetivo" value="Troll" <?= isset($_SESSION['ultimo_objetivo']) && $_SESSION['ultimo_objetivo'] == 'Troll' ? 'checked' : '' ?>>
                <img src="img/troll.jpg" alt="Troll">
            </label>
            <label>
                <input type="radio" name="objetivo" value="Gigante" <?= isset($_SESSION['ultimo_objetivo']) && $_SESSION['ultimo_objetivo'] == 'Gigante' ? 'checked' : '' ?>>
                <img src="img/gigante.jpg" alt="Gigante">
            </label>
        </div>
        <br><br>

        <!-- Botón de seleccionar para actualizar los botones de acción y estadísticas -->
        <button type="submit" name="boton" value="seleccionar">Seleccionar</button>

        <!-- Botón para realizar la acción con el nombre del personaje -->
        <button type="submit" name="boton" value="accion"><?= $nombrePersonaje ?> realiza acción contra <?= $nombreObjetivo ?></button>

        <!-- Botón para mostrar las estadísticas del personaje -->
        <button type="submit" name="boton" value="estadisticas_personaje">Mostrar Estadísticas de <?= $nombrePersonaje ?></button>

        <!-- Botón para mostrar las estadísticas del objetivo -->
        <button type="submit" name="boton" value="estadisticas_objetivo">Mostrar Estadísticas de <?= $nombreObjetivo ?></button>

        <!-- Botón para reiniciar la partida -->
        <button type="submit" name="boton" value="reiniciar">Reiniciar Partida</button>
    </form>

    <!-- Mostrar las estadísticas si se seleccionaron -->
    <?php if (isset($mostrarEstadisticasPersonaje) && $mostrarEstadisticasPersonaje): ?>
        <h2>Estadísticas del Personaje</h2>
        <?php $personaje->mostrarAtributos(); ?>
    <?php endif; ?>

    <?php if (isset($mostrarEstadisticasObjetivo) && $mostrarEstadisticasObjetivo && isset($objetivo)): ?>
        <h2>Estadísticas del Objetivo</h2>
        <?php $objetivo->mostrarAtributos(); ?>
    <?php endif; ?>

</body>

</html>
