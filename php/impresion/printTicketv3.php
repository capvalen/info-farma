<?php

/* Change to the correct path if you copy this example! */
require __DIR__ . '/vendor/mike42/escpos-php/autoload.php';
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
 
    //$connector = new WindowsPrintConnector("smb://192.168.1.131/TM-U220");
$connectorV31 = new WindowsPrintConnector("smb://127.0.0.1/TM-U220");
try {
	$tux = EscposImage::load("localhost/info-farma/images/farmacovid.jpg", false);
	
    // A FilePrintConnector will also work, but on non-Windows systems, writes
    // to an actual file called 'LPT1' rather than giving a useful error.
    // $connector = new FilePrintConnector("LPT1");
    /* Print a "Hello world" receipt" */
    $printer = new Printer($connectorV31);
	$printer -> bitImage($tux);    
 
    $printer -> setEmphasis(true);    
    $printer -> text("         Farmacia Vírgen María\n");
    $printer -> text("     Av. 13 de Noviembre 836 Int-A\n\n");
    $printer -> text("        Ticket de control interno\n");
    $printer -> text($_POST['hora']."\n\n");

    $printer -> text("Cant.  Descripción             SubTotal\n");
    $printer -> text("----------------------------------------\n");
    $printer -> text(ucwords($_POST['texto'])); //recipe 40 catacteres por línea
    
    $printer -> text("\n      Total de ticket: ".$_POST['total']."\n");
    $printer -> text("      Entregado: ".$_POST['dineroDado']."\n");
    $printer -> text("      Cambio: ".$_POST['dineroVuelto']."\n");
    $printer -> text("\n         ¡Gracias por su compra!\n");
    $printer -> text("\n         Reclame su boleta\n\n\n\n");
    $printer -> cut();
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "No se pudo imprimir en la impresora: " . $e -> getMessage() . "\n";
}