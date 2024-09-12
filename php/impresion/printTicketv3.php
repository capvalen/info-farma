<?php

/* Change to the correct path if you copy this example! */
require __DIR__ . './../../mike42/escpos-php/autoload.php';
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
$connectorV31 = new WindowsPrintConnector("smb://127.0.0.1/POS80");
try {
	$tux = EscposImage::load("logo.jpg", false); //./../../images/empresa_centro
	
    // A FilePrintConnector will also work, but on non-Windows systems, writes
    // to an actual file called 'LPT1' rather than giving a useful error.
    // $connector = new FilePrintConnector("LPT1");
    /* Print a "Hello world" receipt" */
    $printer = new Printer($connectorV31);
	
	$printer -> setEmphasis(true);
		$printer->setJustification(Printer::JUSTIFY_CENTER);
		$printer -> bitImage($tux);    
    $printer -> text("Botica's Clinical Home SAC\n");
    $printer -> text("RUC: 20612115771\n");
    $printer -> text("Jr. General Gamarra 1173 Chilca - Huancayo\n");
    $printer -> text("---------------------\n");
    $printer -> text("Ticket de control interno\n\n");
		$printer->setJustification(Printer::JUSTIFY_LEFT);
		$printer -> setEmphasis(false);
    $printer -> text($_POST['hora']."\n\n");
    $printer -> text("Cant.  Descripción             SubTotal\n");
    $printer -> text("---------------------\n");
    $printer -> text(ucwords($_POST['texto'])); //recipe 40 catacteres por línea
    
		$printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer -> text("\nTotal de ticket: ".$_POST['total']."\n");
    $printer -> text("Entregado: ".$_POST['dineroDado']."\n");
    $printer -> text("Cambio: ".$_POST['dineroVuelto']."\n");
		$printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("\n¡Gracias por su compra!\n");
    $printer -> text("\nReclame su boleta\n\n\n\n");
    $printer -> cut();
    
	
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "No se pudo imprimir en la impresora: " . $e -> getMessage() . "\n";
}