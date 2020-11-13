<?php
/**
 * User: Hans-Gert Gräbe
 * Last Update: 2020-09-17

 * Generisches Werkzeug, um RDF aus einer CSV-Datei zu erzeugen.

 * Gibt RDF in Turtlenotation zurück zur Nachbearbeitung mit einem
 * Textprozessor der eigenen Wahl.

 */

require 'helper.php';

// output settings
//=========================
ini_set('default_charset', 'utf-8');

/* Generischer Treiber, dem eine Funktion als Parameter übergeben wird, mit der
   ein einzelner Datensatz der CSV-Datei verarbeitet wird. */

function readCSV($filename,$processing,$prefix,$separator) {
  if (($handle = fopen("$filename", "r")) !== FALSE) {
    $out=''; $row=1000;
    while (($data = fgetcsv($handle, 1000, $separator)) !== FALSE) {
      $out.=$processing($prefix.$row++,$data);
    }
    fclose($handle);
    return TurtlePrefix().$out;
  }
}

// Generische Transformationsfunktion

function createGenericRDF($subject,$data) {
  $a=array(); $cnt=100;
  foreach ($data as $key => $value) {
    $fix=trim($value);
    if (!empty($fix)) $a=addLiteral($a,"ihr:predicate".$cnt,$fix);
    $cnt++;
  }
  return 
    '<http://leipzig-data.de/Data/CSVValue/'.$subject.">\n\t"
    .join(";\n\t",$a).".\n\n";
}

/* Ersetze die generischen durch eigene Feldnamen, die in Array $feldnamen zu
   übergeben sind. */

function postProcess($string,$feldnamen) {
  $genericPredicates=
    array_map(create_function('$i','return "ihr:predicate".$i;'),
    range(100,count($feldnamen)+99));
  // print_r($genericPredicates);
  // print_r($feldnamen);
  $string=str_replace($genericPredicates,$feldnamen,$string);
  return $string;
}

/* Spezifische Transformationsfunktionen */

function createMSS($subject,$data) { // subject is not used
    $a=array(); // Name|Straße|PLZ|Ort|MINT
    $name=$data[0];
    $adresse=createAddress($data[1],"",$data[2],$data[3]);
    //$adresse=preg_replace("/(\d+).$/",".$1",$adresse);
    $id=proposeURI($name);
    $meriten=str_replace(',','","',$data[5]);
    $a=addLiteral($a,"rdfs:label",$name);
    $a=addLiteral($a,"ld:Adresse","$data[1], 0$data[2] $data[3]");
    $a=addResource($a,"ld:hasAdress","",$adresse);
    $a=addLiteral($a,"ld:MINTSchulen",$meriten);
    $a=addLiteral($a,"dct:modified",$data[9]);
    return 
        "<http://leipzig-data.de/Data/Schule/$id> a ld:Schule;\n\t"
        .join(";\n\t",$a).".\n\n";
}

// ---- Transformationen ----

function processData() {
  $out=readCSV("MINTSchulen-Sachsen.csv","createMSS","",",");
  return $out;
}

echo processData();

?>

