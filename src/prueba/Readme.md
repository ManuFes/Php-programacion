# Proyecto: Búsqueda de Camisetas de Fútbol

Este proyecto es una aplicación web simple para buscar camisetas de fútbol por año, equipo o ambos.

## Estructura del proyecto

- **`index.php`**: Página principal con el formulario de búsqueda.
- **`buscar.php`**: Lógica para procesar las búsquedas y mostrar los resultados.
- **`clases/Database.php`**: Clase para manejar la conexión con la base de datos.
- **`mibd.db`**: Base de datos SQLite que contiene la tabla `jerseys`.

## Cómo usar

1. Coloca todos los archivos en tu servidor web.
2. Accede a `index.php` para realizar búsquedas.
3. Asegúrate de que el servidor web tenga permisos de lectura/escritura sobre `mibd.db`.

## Base de datos

La base de datos incluye una tabla llamada `jerseys` con los siguientes campos:

- **`id`**: Identificador único.
- **`team`**: Nombre del equipo.
- **`year`**: Año de la camiseta.
- **`model`**: Tipo de camiseta.

Ejemplo de registros:
- FC Barcelona, 2023, Home Jersey
- Real Madrid, 2021, Home Jersey
