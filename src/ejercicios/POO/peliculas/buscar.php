<?php
require_once 'Pelicula.php';
require_once 'Biblioteca.php';

// Crear la instancia de Biblioteca
$biblioteca = new Biblioteca();

// Lógica de búsqueda a través de AJAX
if (isset($_POST['buscar'])) {
    $titulo = $_POST['buscar'];
    $resultado = $biblioteca->buscarPelicula($titulo);

    if ($resultado) {
        $response = [
            'titulo' => $resultado['titulo'],
            'poster' => $resultado['poster'],
            'plataforma' => $resultado['plataforma'],
            'nota' => $resultado['nota'],
            'argumento' => $resultado['argumento']
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'Película no encontrada']);
    }
}
