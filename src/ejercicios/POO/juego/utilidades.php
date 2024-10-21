<?php

// Función para inicializar los personajes y objetivos en una sola ubicación
function inicializarPartida() {
    $_SESSION['objetivos'] = [
        'Goblin' => new Objetivo('Goblin', 50),
        'Troll' => new Objetivo('Troll', 100),
        'Gigante' => new Objetivo('Gigante', 150),
    ];

    unset($_SESSION['ultimo_personaje']);
    unset($_SESSION['ultimo_objetivo']);
}

