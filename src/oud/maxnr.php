<?
include("dbconnect.php");

$query = "SELECT MAX(nr) FROM programma";

$resultaat = mysql_query ($query);

// MAX_nr in variabele invullen
 while ($line = mysql_fetch_array($resultaat, MYSQL_ASSOC)) {
     foreach ($line as $col_value) {
         $max_nr = $col_value;
         $max_nr = $max_nr + 1;
     }
 }

// Resultaat-set vrij maken
 mysql_free_result($resultaat);

 // Verbinding afsluiten
 mysql_close();
?>