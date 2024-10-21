<?php
// Ya no se necesita session_start porque se maneja en index.php

// Variables para mostrar estadísticas
$mostrarEstadisticasPersonaje = false;
$mostrarEstadisticasObjetivo = false;
$objetivo = null;
$nombrePersonaje = "Personaje"; // Valor por defecto
$nombreObjetivo = "Objetivo";   // Valor por defecto

// Depuración para verificar si los valores están llegando correctamente
if (isset($_POST['personaje']) && isset($_POST['objetivo'])) {
    error_log("Botón pulsado: " . $_POST['boton']);
    error_log("Personaje: " . $_POST['personaje']);
    error_log("Objetivo: " . $_POST['objetivo']);
}

// Procesar la selección del personaje y la acción
if (isset($_POST['personaje']) && !empty($_POST['personaje']) && isset($_POST['boton'])) {
    $personajeSeleccionado = $_POST['personaje'];
    $botonPulsado = $_POST['boton'];
    $objetivoSeleccionado = isset($_POST['objetivo']) && !empty($_POST['objetivo']) ? $_POST['objetivo'] : null;

    // Guardar los valores seleccionados para no perderlos tras enviar el formulario
    $_SESSION['ultimo_personaje'] = $personajeSeleccionado;
    $_SESSION['ultimo_objetivo'] = $objetivoSeleccionado;

    // Asignar el nombre del personaje seleccionado si existe
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

    // Asignar el nombre del objetivo seleccionado si existe
    if ($objetivoSeleccionado !== null && isset($_SESSION['objetivos'][$objetivoSeleccionado])) {
        $objetivo = $_SESSION['objetivos'][$objetivoSeleccionado];
        $nombreObjetivo = $objetivo->nombre;
    }

    // Asegurar que el botón específico ejecuta su función
    if ($botonPulsado === 'seleccionar') {
        // Recargar la página para actualizar las selecciones
        return;
    }

    // Ejecutar acción según el botón pulsado
    if ($personaje !== null) {
        if ($botonPulsado === 'accion' && $objetivoSeleccionado !== null) {
            // Lógica del botón "Realizar Acción"
            $personaje->atacar($objetivo);

            // Actualizar el objetivo en la sesión después del ataque
            $_SESSION['objetivos'][$objetivoSeleccionado] = $objetivo;

        } elseif ($botonPulsado === 'estadisticas_personaje') {
            // Mostrar estadísticas del personaje
            $mostrarEstadisticasPersonaje = true;
        } elseif ($botonPulsado === 'estadisticas_objetivo' && $objetivoSeleccionado !== null) {
            // Mostrar estadísticas del objetivo
            $mostrarEstadisticasObjetivo = true;
        } elseif ($botonPulsado === 'reiniciar') {
            // Reiniciar la partida
            inicializarPartida();
        }
    }
}
