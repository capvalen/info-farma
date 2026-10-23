<?php

/* Change to the correct path if you copy this example! */
require __DIR__ . './../vendor/mike42/escpos-php/autoload.php';
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
 
    $connector4 = new WindowsPrintConnector("smb://127.0.0.1/CAJA");
try {
    $tux = EscposImage::load("../images/empresa.png", false);

    $printer = new Printer($connector4);
    $printer -> bitImageColumnFormat($tux);
    //$printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer -> setEmphasis(true);
    $printer -> text("{$_POST['cknombreEmpresa']}\n");
    $printer -> setEmphasis(false);
    $printer -> text("«{$_POST['ckLemaEmpresa']}»\n");

    $printer -> text("\n");
    $printer -> setEmphasis(true);
    $printer -> text("* {$_POST['queMichiEs']} *\n\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer -> setEmphasis(false);
    $printer -> text("Código: CR-".$_POST['codPrest']."\n");
    $printer -> text("Cliente: ".ucwords($_POST['cliente'])."\n");
    $printer -> setEmphasis(true);
    $printer -> text("Monto pagado: S/ ".$_POST['monto']."\n");
    $printer -> setEmphasis(false);
    $printer -> text("-------------------------------\n\n");
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("".$_POST['hora']."\n");
    $printer -> text("Usuario: ".ucwords($_POST['usuario'])."\n");
    $printer -> text("Contacto: {$_POST['ckcelularEmpresa']} - {$_POST['cktelefonoEmpresa']}\n");
    $printer -> text("Gracias por tu preferencia\n\n\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);

    $printer -> cut();
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "No se pudo imprimir en la impresora: " . $e -> getMessage() . "\n";
}