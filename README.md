# MINT-Data

Eine Sammlung von öffentlich verfügbaren MINT-Daten (u.a aus dem Kontext von
["MINT - Zukunft schaffen"](https://mintzukunftschaffen.de/)).

## Was ist hier aktuell zu finden?

### Verzeichnis RDFData

* Preisträger des MINT-Wettbewerbs des Mitmachfonds Sachsen aus den Jahren
  2019 und 2020 (auch wenn uns auf Anfrage hin mitgeteilt wurde, dass bei der
  Preisvergabe der MINT-Begriff sehr weit ausgelegt wurde.
  * MINT-Preistraeger-2019.ttl,  MINT-Preistraeger-2020.ttl

* MINT-Katalog.ttl ist ein Metakatalog, in dem aus mitteldeutscher Perspektive
  (das umfasst die Bundesländer Sachsen, Sachsen-Anhalt und Thüringen) eine
  Reihe von öffentlich zugänglichen digitalen Projekten zusammengetragen sind,
  in denen über MINT-Aktivitäten berichtet wird.

* MINT-MD.ttl ist ein ähnlicher Metakatalog, der aus einer Excel-Liste
  extrahiert wurde, die von der [AG MINT
  Mitteldeutschland](http://www.leipzig-netz.de/index.php/MINT.Mitteldeutschland) gesammelt wurde.

Im Verzeichnis workbench sind weiter aufzubereitende Daten und Werkzeuge zu
finden.

### Datenmodell

Offene Daten leben davon, dass mit öffentlichen Mitteln zusammengetragene und
aktualisierte Grunddaten von Akteuren angereichert werden.  Dies sind im Fall
MINT-freundlicher Schulen vor allem die Basisdaten von Schulen, die von den
Ländern als Open Data in unterschiedlicher Weise und Offenheit zur Verfügung
gestellt werden.  Um diese Schulen auf einer Karte darzustellen, werden
folgende Basisdaten benötigt:
* Schul-ID (über diese werden Datenanreicherungen der Schule zugeordnet)
* Name der Schule
* Adresse
* Geokoordinaten
* weitere allgemein interessierende Informationen

__Schule__ ist dabei ein RDF-Datentyp, die Schul-ID die
[URI](https://de.wikipedia.org/wiki/Uniform_Resource_Identifier) der konkreten
Instanz dieses Datentyps.  

Im Leipzig-Data-Projekt werden __Adressen__ ebenfalls als Datentyp modelliert,
da sich oft mehrere Schulen an einer Adresse befinden und Adressen auch von
anderen öffentlichen Einrichtungen verwaltet werden als Schulinformationen.

Auch sind __Geokoordinaten__ eher Adressen zuzuordnen als Schulen, und es
besteht die Möglichkeit, solche Geokoordinaten mit entsprechenden Werkzeugen,
etwa dem OS-Tool [Nominatim](https://wiki.openstreetmap.org/wiki/Nominatim)
aus Teilen von Adressinformationen zu extrahieren.  Besser wärer es natürlich,
direkt auf geprüfte Geokoordinaten von Adressen zuzugreifen.  Oft liegen nach
einem solchen Prozess mehrere Geokoordinaten zur selben Adresse vor.  Im
Leipzig-Data-Projekt wird deshalb für Geokoordinaten nicht das (lat, long)
Format, sondern das Format geo:asWKT aus der [geoSPARQL
Ontologie](https://en.wikipedia.org/wiki/OGC_GeoSPARQL) verwendet, mit dem
sich Paare zusammengehörender (lat, long) Daten samllen lassen.

## Verzeichnis CSV-Data

Dort liegen rohe Daten im CSV-Format, aus denen sich Teildaten mit einfacheren
Werkzeugen extrahieren lassen. So wurde etwa die uns interessierenden
Datensätze (gleich Zeilen einer CSV-Datei) für Sachsen und Leipzig mit einem
einfachen "grep" aus den verfügbaren größeren Datenbeständen extrahiert. 

### Übersicht der Mint-freundlichen Schulen usw.

Quelle: Google-Doc-Dokument

* AlleAusgezeichnetenSchulen-2020.csv
* MINTFreundlicheSchulen-2020.csv
* DigitaleSchulen-2020.csv
* MINTSchulen-Sachsen.csv

## Verzeichnis Raw-Data

Dort liegen rohe Daten in validem XML-Format, die weiterer Verarbeitung
harren.

* Komm mach MINT. Von der Webseite
  <https://www.komm-mach-mint.de/schuelerinnen/mint-karte#liste> am 14.11.2020
  gescrapt und in zwei Dateien valides xml verwandelt:
  * KommMachMINT-Kuerzel.xml - Tabelle der Orte und weitere Kürzel
  * KommMachMINT-Tabelle.xml - Tabelle der Angebote

## Verzeichnis web

Der Quellcode einer prototypischen Website, auf der - als proof of concept -
einzelne Datensätze (textuell) visualisiert werden. Diese Seite ist derzeit -
ebenso prototypisch - unter
<http://www.leipzig-netz.de/~graebe/MINT-Kataloge/> ausgerollt.

