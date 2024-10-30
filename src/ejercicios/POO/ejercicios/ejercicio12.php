<?php

enum CategoriaProducto {
    case Electronica;
    case Ropa;
    case Alimentos;
    case Muebles;
}

interface Importable {
    public function calcularImpuesto(): float;
}

abstract class Producto {
    protected string $nombre;
    protected float $precio;
    private static int $totalProductos = 0;

    public function __construct(string $nombre, float $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        self::$totalProductos++;
    }

    abstract public function mostrarDetalles(): void;

    public function aplicarDescuento(float $porcentaje): void {
        $this->precio -= $this->precio * ($porcentaje / 100);
    }

    public static final function obtenerTotalProductos(): int {
        return self::$totalProductos;
    }
}

trait RegistroAuditoria {
    public function registrarAccion(string $accion): void {
        echo "Acción registrada: {$accion}<br>";
    }
}

class ProductoElectronico extends Producto implements Importable {
    use RegistroAuditoria;

    public function calcularImpuesto(): float {
        $impuesto = $this->precio * 0.15;
        $this->registrarAccion("Impuesto calculado para {$this->nombre}: $impuesto");
        return $impuesto;
    }

    public function mostrarDetalles(): void {
        echo "Producto: {$this->nombre}, Precio: {$this->precio}, Categoría: " . CategoriaProducto::Electronica->name . "<br>";
    }

    public function aplicarDescuento(float $porcentaje): void {
        parent::aplicarDescuento($porcentaje);
        $this->registrarAccion("Descuento aplicado a {$this->nombre}: {$porcentaje}%");
    }
}

class ProductoAlimenticio extends Producto implements Importable {
    use RegistroAuditoria;

    public function calcularImpuesto(): float {
        $impuesto = $this->precio * 0.05;
        $this->registrarAccion("Impuesto calculado para {$this->nombre}: $impuesto");
        return $impuesto;
    }

    public function mostrarDetalles(): void {
        echo "Producto: {$this->nombre}, Precio: {$this->precio}, Categoría: " . CategoriaProducto::Alimentos->name . "<br>";
    }

    public function aplicarDescuento(float $porcentaje): void {
        parent::aplicarDescuento($porcentaje);
        $this->registrarAccion("Descuento aplicado a {$this->nombre}: {$porcentaje}%");
    }
}

// Instanciación y uso de las clases
$producto1 = new ProductoElectronico("Laptop", 1000);
$producto2 = new ProductoAlimenticio("Manzanas", 5);

$producto1->aplicarDescuento(10);
$producto1->calcularImpuesto();
$producto1->mostrarDetalles();

$producto2->aplicarDescuento(5);
$producto2->calcularImpuesto();
$producto2->mostrarDetalles();

echo "Total de productos creados: " . Producto::obtenerTotalProductos() . "<br>";
