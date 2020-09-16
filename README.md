# MINT-Data

Eine Sammlung von öffentlich verfügbaren MINT-Daten (u.a aus dem Kontext von
["MINT - Zukunft schaffen"](https://mintzukunftschaffen.de/)) und

## Was ist hier aktuell zu finden?

Im Verzeichnis RDFData

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
finden, aktuell

* MINTSchulen-Sachsen.csv - eine Liste von MINT-freundlichen Schule in Sachsen.

## Datenmodell

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