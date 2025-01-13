<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Camisetas de Fútbol</title>
    <link rel="stylesheet" href="assets/styles.css">
    <script src="assets/suggestions.js" defer></script>
</head>
<body>
    <button class="toggle-dark-mode" onclick="toggleDarkMode()">Modo Oscuro</button>
    <h1>Buscar Camisetas de Fútbol</h1>
    <form action="buscar.php" method="GET">
        <label for="year">Año:</label>
        <input type="number" id="year" name="year" placeholder="Ej: 2023">
        <br>
        <label for="team">Equipo:</label>
        <input type="text" id="team" name="team" placeholder="Ej: FC Barcelona" autocomplete="off">
        <ul id="suggestions"></ul>
        <br>
        <button type="submit">Buscar</button>
    </form>
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
</body>
</html>
