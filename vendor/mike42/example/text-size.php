<?php
/**
 * This print-out shows how large the available font sizes are. It is included
 * separately due to the amount of text it prints.
 *
 * @author Michael Billington <michael.billington@gmail.com>
 */
require __DIR__ . '/../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


$connector = new WindowsPrintConnector("TM-U220");
$printer = new Printer($connector);

$fonts = array(Printer::FONT_A, Printer::FONT_B);

/* Initialize */
$printer -> initialize();

$printer -> setFont($fonts[1]);



$printer -> text("Microgynon Levonogestrel X Caja X21 Grageas\n");

$printer -> cut();
$printer -> close();

function title(Printer $printer, $text)
{
    $printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
    $printer -> text("\n" . $text);
    $printer -> selectPrintMode(); // Reset
}
