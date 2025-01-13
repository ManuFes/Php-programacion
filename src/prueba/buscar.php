<?php
require_once 'clases/Database.php';

$db = new Database();

// Obtener parámetros de búsqueda desde el formulario
$year = isset($_GET['year']) ? intval($_GET['year']) : null;
$team = isset($_GET['team']) ? trim($_GET['team']) : null;

// Construir la consulta base
$query = "SELECT * FROM jerseys WHERE 1=1";
$params = [];

// Añadir condiciones dinámicamente según los parámetros recibidos
if ($year) {
    $query .= " AND year = :year";
    $params[':year'] = $year;
}
if ($team) {
    $query .= " AND LOWER(team) LIKE :team";
    $params[':team'] = '%' . strtolower($team) . '%';
}

// Preparar y ejecutar la consulta
$result = $db->query($query, $params);

// Mostrar resultados
echo "<h1>Resultados de la búsqueda</h1>";
if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Equipo</th><th>Año</th><th>Modelo</th></tr>";
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['team']) . "</td>";
        echo "<td>" . htmlspecialchars($row['year']) . "</td>";
        echo "<td>" . htmlspecialchars($row['model']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron resultados.</p>";
}

// Cerrar la conexión con la base de datos
$db->close();
?>
