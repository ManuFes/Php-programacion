<?php
class Calculadora {
    public static final function sumar($a, $b) {
        return $a + $b;
    }
}

$resultado = Calculadora::sumar(10, 20);
echo "El resultado de la suma es: " . $resultado;
