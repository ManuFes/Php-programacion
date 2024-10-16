<?php

# Definir la clase PERSONA
class Persona {

    private readonly string $dni;
    public string $nombre;
    private string $apellido;
    private int $edad;
    private string $curso = "sin curso";

    # Constructor de la clase
    
    public function __construct(string $dni, string $nombre, string $apellido, int $edad) {
        $this->dni = $dni; 
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
     }

    // public function __destruct() {
    //     echo "Objeto destruido" ;
    // }

    # En lugar de preguntar si se puede matricular, lo hacemos directamente
    public function matricularCurso(string $curso): void {
        if ($this->curso == "sin curso") {
            $this->curso = $curso;
        } else {
            echo "No se puede matricular en más de un curso.";
        }
        echo "Se ha registrado en el curso: $curso\n";
    }
    public function matricularEnCurso(string $curso): void {
        if($this->edad >= 18) {
            $this->curso = $curso;
            echo "{$this->nombre} ha sido matriculado en {$this->curso}.<br>";
        } else {
            echo "{$this->nombre} no se puede matricular por ser menor de edad.<br>";
        }
    }

    # Podemos imprimir directamente el estado del objeto sin getters
    public function imprimirInformacion(): void {
        echo "Nombre: {$this->nombre}<br> Apellido: {$this->apellido}<br> Edad: {$this->edad}<br> Curso: {$this->curso}<br>";
    }

    public function __get(string $propiedad){
        if (property_exists("Persona",$propiedad)) return $this->$propiedad;
    }

}

# Ejecución
$foo = new Persona("12345678A", "Juan", "Jimenez", 20);

# Decimos al objeto que debe matricularse en un curso
$foo->matricularEnCurso("2ºDAW");

# Pedimos al objeto que imprima su información
$foo->imprimirInformacion();

echo ($foo?->nombre ?? "El objeto es nulo")

?>
