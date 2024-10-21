<?php
// Incluir las clases y utilidades antes de iniciar la sesión o procesar cualquier acción
require_once 'clases.php';
require_once 'utilidades.php';
require_once 'procesar_accion.php';

session_start(); // Iniciar la sesión aquí, sin ninguna salida previa

// Inicializar la partida si aún no se ha hecho
if (!isset($_SESSION['objetivos'])) {
    inicializarPartida();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Personajes</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        function seleccionarPersonaje(personaje) {
            // Actualizamos el input oculto con el valor del personaje seleccionado
            document.getElementById('personaje').value = personaje;
            console.log("Personaje seleccionado: " + personaje); // Depuración
        }

        function seleccionarObjetivo(objetivo) {
            // Actualizamos el input oculto con el valor del objetivo seleccionado
            document.getElementById('objetivo').value = objetivo;
            console.log("Objetivo seleccionado: " + objetivo); // Depuración
        }
    </script>
</head>

<body>
    <h1>Selecciona un Personaje</h1>
    <form method="POST" action="">
        <!-- Inputs ocultos para almacenar los valores seleccionados -->
        <input type="hidden" name="personaje" id="personaje">
        <input type="hidden" name="objetivo" id="objetivo">

        <!-- Selección de Personajes -->
        <div class="seleccion-personajes">
            <img id="personaje-Paladin" src="img/paladin.jpg" class="seleccionable" onclick="seleccionarPersonaje('Paladin')" alt="Paladín">
            <img id="personaje-Mago" src="img/mago.jpg" class="seleccionable" onclick="seleccionarPersonaje('Mago')" alt="Mago">
            <img id="personaje-Caballero" src="img/caballero.jpg" class="seleccionable" onclick="seleccionarPersonaje('Caballero')" alt="Caballero">
        </div>

        <br>
        <h1>Selecciona un Objetivo</h1>
        <div class="seleccion-personajes">
            <img id="objetivo-Goblin" src="img/goblin.jpg" class="seleccionable" onclick="seleccionarObjetivo('Goblin')" alt="Goblin">
            <img id="objetivo-Troll" src="img/troll.jpg" class="seleccionable" onclick="seleccionarObjetivo('Troll')" alt="Troll">
            <img id="objetivo-Gigante" src="img/gigante.jpg" class="seleccionable" onclick="seleccionarObjetivo('Gigante')" alt="Gigante">
        </div>

        <br><br>

        <button type="submit" name="boton" value="seleccionar">Seleccionar</button>
        <button type="submit" name="boton" value="accion"><?= $nombrePersonaje ?> realiza acción contra <?= $nombreObjetivo ?></button>
        <button type="submit" name="boton" value="estadisticas_personaje">Mostrar Estadísticas de <?= $nombrePersonaje ?></button>
        <button type="submit" name="boton" value="estadisticas_objetivo">Mostrar Estadísticas de <?= $nombreObjetivo ?></button>
        <button type="submit" name="boton" value="reiniciar">Reiniciar Partida</button>
    </form>

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
