<?php
interface Exportable {
    public function exportar();
}

class PDF implements Exportable {
    public function exportar() {
        echo "Exportando a PDF<br>";
    }
}

class Excel implements Exportable {
    public function exportar() {
        echo "Exportando a Excel<br>";
    }
}

$pdf = new PDF();
$pdf->exportar();

$excel = new Excel();
$excel->exportar();
