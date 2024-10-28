<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <title>Buscar Película</title>
    <!-- Incluyendo jQuery desde la CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Escuchar el envío del formulario
            $("form").on("submit", function(event) {
                event.preventDefault(); // Prevenir la recarga de la página

                var titulo = $("input[name='buscar']").val();

                // Enviar la solicitud AJAX
                $.ajax({
                    url: 'buscar.php', // Ruta al archivo PHP que procesará la búsqueda
                    type: 'POST',
                    data: {buscar: titulo},
                    success: function(response) {
                        var data = JSON.parse(response);

                        if (data.error) {
                            $(".resultados").html("<p>" + data.error + "</p>");
                        } else {
                            $(".resultados").html(
                                "<div class='pelicula'>" +
                                "<img class='poster' src='" + data.poster + "' alt='Poster de " + data.titulo + "'>" +
                                "<div class='info'>" +
                                "<h2>" + data.titulo + "</h2>" +
                                "<p class='plataforma'>Plataforma: " + data.plataforma + "</p>" +
                                "<p class='nota'>Nota: " + data.nota + "</p>" +
                                "<p class='argumento'>" + data.argumento + "</p>" +
                                "</div></div>"
                            );
                        }
                    },
                    error: function() {
                        $(".resultados").html("<p>Hubo un error en la búsqueda.</p>");
                    }
                });
            });
        });
    </script>
</head>
<body>

<h1>Buscar Película</h1>

<form method="POST">
    <input type="text" name="buscar" placeholder="Escribe el título de la película">
    <button type="submit">Buscar</button>
</form>

<div class="resultados">
    <!-- Aquí se mostrarán los resultados -->
</div>

</body>
</html>
