<?php
/* Print-outs using the newer graphics print command */

require __DIR__ . './../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\FilePrintConnector;

//$connector = new FilePrintConnector("php://stdout");
$connector = new WindowsPrintConnector("smb://127.0.0.1/CAJA");
$printer = new Printer($connector);

try {
    $tux = EscposImage::load("./logo.jpg", false);
    
    $printer -> bitImageColumnFormat($tux);
    $printer -> text("Regular Tux.\n");
    $printer -> feed();
    $printer -> cut();
} catch (Exception $e) {
    /* Images not supported on your PHP, or image file not found */
    $printer -> text($e -> getMessage() . "\n");
}

$printer -> close();
