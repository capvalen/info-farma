<?php
session_start();
/* Change to the correct path if you copy this example! */
require __DIR__ . './../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage; //librería de imagen
/**
 * Assuming your printer is available at LPT1,
 * simpy instantiate a WindowsPrintConnector to it.
 *
 * When troubleshooting, make sure you can send it
 * data from the command-line first:
 *  echo "Hello World" > LPT1
 */
    $connector = new WindowsPrintConnector("smb://127.0.0.1/PRINT80");
    /*$connector = new WindowsPrintConnector("smb://127.0.0.1/TM-U220");*/
try {
    
    // A FilePrintConnector will also work, but on non-Windows systems, writes
    // to an actual file called 'LPT1' rather than giving a useful error.
    // $connector = new FilePrintConnector("LPT1");
    /* Print a "Hello world" receipt" */
	$tux = EscposImage::load("logo.jpg", false);
	
	
    $printer = new Printer($connector);
	$printer -> bitImage($tux);
    $printer -> text("CARDIOFARMA\n\n\n");
    
    $printer -> text("       Gracias por tu preferencia");
    $printer -> cut();
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "No se pudo imprimir en la impresora: " . $e -> getMessage() . "\n";
}