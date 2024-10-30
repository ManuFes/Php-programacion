<?php
// Definir la clase Cuenta
class Cuenta {
    protected $saldo;

    public function __construct() {
        $this->saldo = 0;
    }

    public function depositar($cantidad) {
        $this->saldo += $cantidad;
        echo "Depositado: $cantidad<br>";
    }

    public function mostrarSaldo() {
        echo "El saldo actual es: $" . $this->saldo . "<br>";
    }
}

// Definir el trait Autenticable
trait Autenticable {
    public function autenticar() {
        echo "Autenticando usuario...<br>";
    }
}

// Definir la clase CuentaBancaria que extiende de Cuenta y usa el trait Autenticable
class CuentaBancaria extends Cuenta {
    use Autenticable;

    public function retirar($cantidad) {
        $this->autenticar();
        if ($cantidad > $this->saldo) {
            echo "Fondos insuficientes para retirar: $cantidad<br>";
        } else {
            $this->saldo -= $cantidad;
            echo "Retirado: $cantidad<br>";
        }
    }

    public function depositar($cantidad) {
        $this->autenticar();
        parent::depositar($cantidad); // Llamar al método depositar de la clase base
    }
}

// Crear una instancia de CuentaBancaria y realizar operaciones
$cuenta = new CuentaBancaria();
$cuenta->depositar(100);
$cuenta->mostrarSaldo();

$cuenta->retirar(30);
$cuenta->mostrarSaldo();

$cuenta->retirar(80);
$cuenta->mostrarSaldo();

$cuenta->depositar(50);
$cuenta->mostrarSaldo();
?>
