<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/vendor/mike42/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Assuming your printer is available at LPT1,
 * simpy instantiate a WindowsPrintConnector to it.
 *
 * When troubleshooting, make sure you can send it
 * data from the command-line first:
 *  echo "Hello World" > LPT1
 *
 * Para que funcine se debe dar todos los derechos al folder: C:\Windows\System32\spool\PRINTERS luego agregar o dar permisos al usuario Invitado 
 */
try {
    $connector = new WindowsPrintConnector('smb://PCFARMACIA/TM-U220');
    
    // A FilePrintConnector will also work, but on non-Windows systems, writes
    // to an actual file called 'LPT1' rather than giving a useful error.
    // $connector = new FilePrintConnector("LPT1");

    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);

    $printer -> setEmphasis(true);
    $printer -> text("         Farmacia Vírgen María\n");
    $printer -> text("     Av. 13 de Noviembre 836 Int-A\n\n");
    $printer -> text("        Ticket de control interno\n");
    $printer -> text($_POST['hora']."\n\n");

    $printer -> text("Cant.     Descripción           SubTotal\n");
    $printer -> text("----------------------------------------\n");
    $printer -> text(ucwords($_POST['texto'])); //recipe 40 catacteres por línea
    
    $printer -> text("\n      Total de ticket: ".$_POST['total']."\n");
    $printer -> text("      Entregado: ".$_POST['dineroDado']."\n");
    $printer -> text("      Cambio: ".$_POST['dineroVuelto']."\n");
    $printer -> text("\n         ¡Gracias por su compra!\n");
    $printer -> text("\n         Reclame su boleta\n");
    $printer -> cut();

    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
