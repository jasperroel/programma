<? include ("../inc/top.php"); ?>

<? //Start code: Admin info
if (isset($_REQUEST["code"]) && $_REQUEST["code"] == 'admin_info'){ ?>
  Sessions:
  <pre>
    <?
	print_r($_SESSION);
    $included_files =  get_included_files();
	?>
  </pre>
  <pre>
    Include files
{
	<?
    $nr = 1;
	$included_files =  get_included_files();
    foreach ($included_files as $filename) {
      echo "\n    [$nr] $filename";
      $nr++;
    }
	echo "
  \n"; ?>
}</pre>
<? }

//Einde code: Admin info
?>

<? //Start code: Groepen
if (isset($_REQUEST["code"]) && $_REQUEST["code"] == 'groepen'){ ?>
<p>
<? //Start code: Groep toevoegen
if (isset($_REQUEST["actie"]) && $_REQUEST["actie"] == 'groeptoevoegen'){

$groepsnaam = $_POST['groep'];

DBOpen();
$queryMAX = "SELECT MAX(groepsnr) FROM groep";
$resultaat = mysql_query ($queryMAX);
// MAX_nr in variabele invullen
 while ($line = mysql_fetch_array($resultaat, MYSQL_ASSOC)) {
     foreach ($line as $col_value) {
         $max_nr = $col_value;
         $max_nr = $max_nr + 1;     } }
// Resultaat-set vrij maken
 mysql_free_result($resultaat);
 // Verbinding afsluiten
 mysql_close();

DBOpen();
  $query = "INSERT INTO groep ( `groepsnr` , `groepsnaam`) VALUES($max_nr, '$groepsnaam')";
  //Hier wordt het programma toegevoegd.
  $result = mysql_query($query) or die("Deze query: <b>$query</b><br><br>Deze error:<b>" .mysql_error(). $empty);
  //Toon dit bericht als de groep is toegevoegd.
  statusoverzicht("Succes!","De groep is toegevoegd! Ga nu weer terug naar <a href='index.php'>het hoofdmenu</a>.","succes");

}
//Einde code: Groep toevoegen ?>

<? //Start code: groep aanpassen
if (isset($_REQUEST["actie"]) && $_REQUEST["actie"] == 'groepwijzig'){

$groepsnaam = $_POST['groepsnaam'];
$groepsnr = $_POST['groepsnr'];

DBOpen();
  $query = "UPDATE groep SET groepsnaam = '$groepsnaam' WHERE groepsnr = $groepsnr;";
  //Hier wordt de groep aangepast.
  $result = mysql_query($query) or die("Deze query: <b>$query</b><br><br>Deze error:<b>" .mysql_error(). $empty);
  //Toon dit bericht als de groep is aangepast.
  echo "De groep is aangepast! Ga nu weer terug naar <a href='index.php'>het hoofdmenu</a>.";



}
//Einde code: groep aanpassen ?>

<? //Start code: groep verwijderen
if (isset($_REQUEST["actie"]) && $_REQUEST["actie"] == 'groepverwijderen'){

$groepsnr = $_POST['sel_groep'];

DBOpen();

  $query = "DELETE FROM groep WHERE groepsnr = $groepsnr LIMIT 1";

  //Hier wordt de groep verwijderd
  $result = mysql_query($query) or die("Deze query: <b>$query</b><br><br>Deze error:<b>" .mysql_error(). $empty);

  //Toon dit bericht als de groep is verwijderd.
  echo "De groep is verwijderd! Ga nu weer terug naar <a href='index.php'>het hoofdmenu</a>.";

} //Einde code: Groep verwijderen

?>
</p>
<? //begin Groepenoverzicht
DBOpen();

$query = "SELECT groepsnr, groepsnaam FROM groep ORDER BY `groepsnr`";
$resultaat = mysql_query ($query);
?>
<table width="100%" border="1">
  <tr>
    <th width="65">Groepsnr</th>
    <th>Groepsnaam</th>
  </tr>
    <?  while ($record = mysql_fetch_object($resultaat)){ ?>
  <tr>
    <td width="65"><? echo $record->groepsnr; ?></td>
    <td><? echo $record->groepsnaam; ?></td>
	<td width="290">
	  <form action="<? print $_SERVER['PHP_SELF']  ?>?code=groepen&actie=groepwijzig" method="post">
	    <input name="groepsnaam" type="text" id="groepsnaam" value="<? echo $record->groepsnaam; ?>" size="35">
		<input name="groepsnr" type="hidden" id="groepsnr" value="<? echo $record->groepsnr; ?>">
		<input name="Wijzig" type="submit" value="Wijzig">
	  </form>	</td>
	<td width="20">
	  <form action="<? print $_SERVER['PHP_SELF']  ?>?code=groepen&actie=groepverwijderen" method="post" name="frmVerwijderGroep" id="frmVerwijderGroep">
		<input name="sel_groep" type="hidden" id="sel_groep" value="<? echo $record->groepsnr; ?>">
		<input type="submit" name="Submit2" value="Verwijderen">
      </form>
	</td>
    <? } ?>
  </tr>
</table>

      <p>&nbsp;</p>
      <table width="75%" border="1">
        <tr>
          <td><strong>Een nieuwe groep toevoegen</strong></td>
          <td><form action="<? print $_SERVER['PHP_SELF']  ?>?code=groepen&amp;actie=groeptoevoegen" method="post" name="frmNieuweGroep" id="frmNieuweGroep">
              <input name="groep" type="text" id="groep" size="30" maxlength="30">
              <input type="submit" name="Submit" value="Toevoegen">
            </form></td>
        </tr>
      </table>

<?
//Einde overzicht groepen

} //Einde code: Groepen ?>

<? //Start code: Speltakken
if (isset ($_REQUEST["code"]) && $_REQUEST["code"] == 'speltakken'){
DBOpen();

$query = "SELECT speltaknr, speltaknaam FROM speltak ORDER BY `speltaknr`";
$resultaat = mysql_query ($query);
?>
      <table width="75%" border="1">
  <tr>
    <th>Speltaknr</th>
    <th>Speltaknaam</th>
  </tr>
    <?  while ($record = mysql_fetch_object($resultaat)){ ?>
  <tr>
    <td><? echo $record->speltaknr; ?></td>
    <td><? echo $record->speltaknaam; ?></td>
    <? } ?>
  </tr>
</table>

      <p>&nbsp;</p>
      <table width="75%" border="1">
        <tr>
          <td><strong>Een nieuwe speltak toevoegen</strong></td>
          <td><form action="<? print $_SERVER['PHP_SELF']  ?>?code=speltakken&amp;actie=speltaktoevoegen" method="post" name="frmNieuweSpeltak" id="frmNieuweSpeltak">
              <input name="speltak" type="text" id="groep" size="30" maxlength="30">
              <input type="submit" name="Submit" value="Toevoegen">
            </form></td>
        </tr>
        <tr>
          <td><strong>Een speltak verwijderen</strong></td>
          <td><form action="<? print $_SERVER['PHP_SELF']  ?>?code=speltakken&actie=speltakverwijderen" method="post" name="frmVerwijderSpeltak" id="frmVerwijderSpeltak">
              <select name="speltak" id="select2">
                <? radio_speltak() ?>
              </select>
              <input type="submit" name="Submit2" value="Verwijderen">
            </form></td>
        </tr>
      </table>
      <p>
<? //Start code: Speltak toevoegen
if (isset($_REQUEST["actie"]) && $_REQUEST["actie"] ==  'speltaktoevoegen'){

$speltaknaam = $_POST['speltak'];

DBOpen();
$queryMAX = "SELECT MAX(speltaknr) FROM speltak";
$resultaat = mysql_query ($queryMAX);
// MAX_nr in variabele invullen
 while ($line = mysql_fetch_array($resultaat, MYSQL_ASSOC)) {
     foreach ($line as $col_value) {
         $max_nr = $col_value;
         $max_nr = $max_nr + 1;     } }
// Resultaat-set vrij maken
 mysql_free_result($resultaat);
 // Verbinding afsluiten
 mysql_close();

DBOpen();
  $query = "INSERT INTO speltak ( `speltaknr` , `speltaknaam`) VALUES($max_nr, '$speltaknaam')";
  //Hier wordt de speltak toegevoegd.
  $result = mysql_query($query) or die("Deze query: <b>$query</b><br><br>Deze error:<b>" .mysql_error(). $empty);
  //Toon dit bericht als de speltak is toegevoegd.
  echo "De speltak is toegevoegd! Ga nu weer terug naar <a href='index.php'>het hoofdmenu</a>.";

}
//Einde code: Speltak toevoegen ?>
<?
//Start code: Speltak verwijderen
if (isset($_REQUEST["actie"]) && $_REQUEST["actie"] == 'speltakverwijderen'){

$speltaknr = $_POST['speltak'];

DBOpen();

  $query = "DELETE FROM speltak WHERE speltaknr = $speltaknr LIMIT 1";

  //Hier wordt de speltak verwijderd
  $result = mysql_query($query) or die("Deze query: <b>$query</b><br><br>Deze error:<b>" .mysql_error(). $empty);

  //Toon dit bericht als de speltak is verwijderd.
  echo "De speltak is verwijderd! Ga nu weer terug naar <a href='index.php'>het hoofdmenu</a>.";

}
//Einde code: Speltak verwijderen

}
//Einde code: Speltakken
?>
      </p>
      <? include ("../inc/bottom.php"); ?>