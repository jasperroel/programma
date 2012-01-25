<? include ("inc/top.php"); ?>

<?
if (isset($_REQUEST["code"]) && $_REQUEST["code"] == 'nieuw') {
?>
  <h1>Programma invoeren</h1>
  <p>Dit programma is voor de 
     <? if (isset($_SESSION['speltak'])){
	   $speltak = $_SESSION['speltak']; ?>
	   <strong><? echo $speltak ?></strong>
	 <? } else { ?>
       <form action="session.php?setting=speltak" method="post" 
target="_self" id="frmSelecteerSpeltak">
         <select name="sel_speltak" id="select2">
           <option value='negeer' selected>Kies hier je 
speltak...</option>
		     <? radio_speltak() ?>
         </select>
         <input name="Submit" type="submit" id="Submit" value="Deze!">
	   </form>
	 <? } ?>
  </p>
        
  <p>
	Voor welke datum is dit programma?<br>
    <em><strong>OPMERKING</strong>: De berekende data zijn niet altijd 
correct,
    controleer deze a.u.b.</em>
  </p>
  <p>
    <input type="radio" name="radiobutton" 
onClick="JavaScript:volg_url('programma.php?code=date_set')">
    Geen specifieke datum
  </p>
  <p>
    <?
    // Even de variabelen goedzetten
    if (isset($_SESSION["speltaknr"])) {
      DBOpen();
      $query = "SELECT dag FROM speltak_details WHERE speltaknr = ".$_SESSION["speltaknr"];
  	  $resultaat = mysql_query ($query);
	  $record = mysql_fetch_object($resultaat);
	  $speltak_dagnr = $record->dag;
      ?>
      <? if (!$speltak_dagnr == ""){ ?>
      <? $datum = mk_week_to_dates(date("W") - 1,date("Y")); ?>
	  <input type="radio" name="radiobutton" onClick="JavaScript:volg_url('programma.php?code=date_set&date=<? echo date("d/m/Y",$datum[$speltak_dagnr]); ?>')">
      Vorige week <? echo strftime("%A %e  %B %Y",$datum[$speltak_dagnr]); ?><br>
      <? $datum = mk_week_to_dates(date("W"),date("Y")); ?>

      <? if (strftime ("%u") == $speltak_dagnr){ ?>        
		<input type="radio" name="radiobutton" onClick="JavaScript:volg_url('programma.php?code=date_set&date=<? echo date("d/m/Y",$datum[$speltak_dagnr]); ?>')">
        Vandaag <? echo strftime("%A %e  %B %Y",$datum[$speltak_dagnr]); ?><br>
	  <? } ?>
      <? if (strftime ("%u") < $speltak_dagnr){ ?>
        <input type="radio" name="radiobutton" onClick="JavaScript:volg_url('programma.php?code=date_set&date=<? echo date("d/m/Y",$datum[$speltak_dagnr]); ?>')">
        Aankomende <? echo strftime("%A %e  %B %Y",$datum[$speltak_dagnr]); ?><br>
	  <? } ?>
      <? if (strftime ("%u") > $speltak_dagnr){ ?>
        <input type="radio" name="radiobutton" onClick="JavaScript:volg_url('programma.php?code=date_set&date=<? echo date("d/m/Y",$datum[$speltak_dagnr]); ?>')">
        Afgelopen <? echo strftime("%A %e  %B %Y",$datum[$speltak_dagnr]); ?><br>
	  <? } ?>

      <? $datum = mk_week_to_dates(date("W") + 1,date("Y")); ?>
      <input type="radio" name="radiobutton" onClick="JavaScript:volg_url('programma.php?code=date_set&date=<? echo date("d/m/Y",$datum[$speltak_dagnr]); ?>')">
      Volgende week <? echo strftime("%A %e  %B %Y",$datum[$speltak_dagnr]); ?>
	  <? } ?>
  </p>

<?
} }//Einde code = nieuw
?>

<? 
if (isset($_REQUEST["code"]) && $_REQUEST["code"] == 'date_set') {
?>
  <p>Dit programma is voor de
    <?
	if (isset($_SESSION['speltak'])){
	  $speltak = $_SESSION['speltak']; ?>
	  <strong><? echo $speltak; ?></strong>
    <? } else { ?>
     <form action='session.php' method='post' name='frmSelecteerSpeltak' 
target='_self'>
       <select name='sel_speltak' id='select'>
         <option value='negeer' selected>Kies hier je speltak...</option>
		 <? radio_speltak() ?>
       </select>
         <input name='setting' type='hidden' value='speltak'>
         <input name='oude_url' type='hidden' value='$fullCurrentURL'>
         <input name='Submit' type='submit' id='Submit' value='Deze!'>
	 </form><? } ?>
  </p>
  <p>
    Dit programma komt ten goede van deze groep: 
    <?
	if (isset($_SESSION['groep'])){
	  $groep = $_SESSION['groep']; ?>
	  <strong><? echo $groep; ?></strong>
	<? } else { ?>
      <form action='session.php' method='post' name='frmSelecteerGroep' 
target='_self'>
        <select name='sel_groep' id='select'>
          <option value='negeer' selected>Kies hier je groep...</option>
          <? radio_groep() ?>
        </select>
          <input name='setting' type='hidden' value='groep'>
          <input name='oude_url' type='hidden' value='$fullCurrentURL'>
          <input type='submit' name='Submit' id='Submit' value='Deze!'>
		</form> <? } ?>
  </p>
  <p>
    <? if (isset($date)) { ?>
	  En het is voor deze datum:
	  <? echo $date; } ?>

  <form action="programma.php" method="post" name="nieuwprogramma">
    <table width="75%" border="0" bgcolor="#FFCC33">
      <tr>
        <td>Naam <font color="#666666" size="-1">verplicht</font></td>
        <td><input name="naam" type="text" id="naam"> <font 
color="#666666" size="-1">kort maar krachtig</font></td>
    </tr>
    <tr>
      <td>Doel</td>
      <td><input name="doel" type="text" id="doel"> </td>
    </tr>
    <tr>
      <td>Spelduur</td>
      <td><input name="spelduur" type="text" id="spelduur" size="6" 
maxlength="2">uur</td>
    </tr>
    <tr>
      <td>Plaats</td>
      <td><input name="plaats" type="text" id="plaats"> <font 
color="#666666" size="-1">bv. bos, boerderij</font></td>
    </tr>
    <tr>
      <td>Materiaal<br> <font color="#666666" size="-1">Welke materialen 
zijn er nodig</font> </td>
      <td><textarea name="materiaal" id="materiaal"></textarea></td>
    </tr>
    <tr>
      <td>Soort</td>
      <td><table width="75%" border="0">
                <tr>
            <td><input type="checkbox" value="tik" name="soort[]" />
              tik</td>
            <td><input type="checkbox" value="denk" name="soort[]" />
              denk</td>
          </tr>
          <tr>
            <td><input type="checkbox" value="bal" name="soort[]" />
              bal</td>
            <td><input type="checkbox" value="zoek" name="soort[]" />
              zoek</td>
          </tr>
          <tr>
            <td><input type="checkbox" value="kracht" name="soort[]" />
              kracht</td>
            <td><input type="checkbox" value="thema" name="soort[]" />
              thema</td>
          </tr>
          <tr>
            <td><input type="checkbox" value="behendigheid" name="soort[]" 
/>
              behendigheid</td>
            <td><input type="checkbox" value="anders" name="soort[]" />
              anders</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>Aantal</td>
      <td><input name="aantal" type="text" id="aantal">
        welpen </td>
    </tr>
    <tr>
      <td>Speciaal<br>
          <font color="#666666" size="-1">Voor overige 
behoeftes</font></td>
      <td><textarea name="speciaal" id="speciaal"></textarea> </td>
    </tr>
    <tr>
      <td>Omschrijving <font color="#666666" 
size="-1">verplicht</font><br>
                <font size="-1" color="#666666">Geef de volledige 
omschrijving 
                van de activiteit</font></td>
      <td><textarea name="omschrijving" id="omschrijving"></textarea></td>
    </tr>
    <tr>
      <td>Als je alles hebt ingevuld
        <input name="code" type="hidden" id="code" value="invoeren">
		<? if (isset($date)){ ?>
		  <input name="date" type="hidden" id="date" value="<? 
echo $date ?>">
		<? } ?>
	  </td>
      <td><input type="submit" name="Submit" value="Verstuur"></td>
    </tr>
  </table>
</form>
</p>

<? } //Einde code = date_set
?>

<?
if (isset($_REQUEST["code"]) && $_REQUEST["code"] == 'toon') {
  DBOpen();
  if (!isset($_REQUEST["programmanr"])) {
    $query = "SELECT * FROM programma ORDER BY nr DESC";
  } else {
    $query = "SELECT * FROM programma WHERE nr = " . $_REQUEST["programmanr"];
  }

$resultaat = mysql_query ($query);

while ($record = mysql_fetch_object($resultaat)){ ?>
      <table width='75%' border='1'>
        <tr> 
          <td>Nr.</td>
          <td colspan="4"><? echo $record->nr ?></td>
        </tr>
        <tr> 
          <td>Naam</td>
          <td width="25%">
		    <? echo $record->naam ?>
		  </td>
          <td width="25%">
		    <input name='wijzig' type='submit' id='wijzig' 
value='Wijzig'></td>
          <td width="25%">
		    <form action=?spelnr=<? echo $record->nr ?>&zeker=nee 
method='post' name='frmEdit' target='_self'>
			<input name='verwijder' type='submit' 
id='verwijder2' value='Verwijder'>
			</form>
		  </td>
          <td width="25%">
			<form action="?code=toon&amp;programmanr=<? echo 
$record->nr ?>" method="post" name="frmPrint" target="_self">
			<input name='print' type='submit' id='print2' 
value='Printversie'>
			</form>
		  </td>
        </tr>
        <tr> 
          <td colspan='5'><center>
              <strong>Dit spel is ingestuurd door de scoutinggroep 
              <?
			    $query2 = "SELECT groepsnaam FROM groep WHERE 
groepsnr = $record->groepsnr";
                $resultaat2 = mysql_query ($query2);
                $record2 = mysql_fetch_object($resultaat2);
                echo "$record2->groepsnaam";
			  ?>
              !!!</strong><br>
              <?
			    $query3 = "SELECT datum FROM 
programma_uitvoering WHERE programma = $record->nr AND groepsnr = 
$record->groepsnr";
				$resultaat3 = mysql_query ($query3);
				$record3 = 
mysql_fetch_object($resultaat3);
				if ($record3->datum <> '') {?>
                  Jij hebt dit spel voor het laatst gedraaid op <? echo " 
$record3->datum !";
				}
			  ?> 
              <em></em> </center></td>
        </tr>
        <tr> 
          <td>Speltak</td>
          <td colspan="4"> 
            <?  $query2 = "SELECT speltaknaam FROM speltak WHERE speltaknr 
= $record->speltaknr";
  $resultaat2 = mysql_query ($query2);
  while ($record2 = mysql_fetch_object($resultaat2)){
   echo $record2->speltaknaam; } ?>
          </td>
        </tr>
        <tr> 
          <td>Doel</td>
          <td colspan="4"><? echo $record->doel ?></td>
        </tr>
        <tr> 
          <td>Spelduur</td>
          <td colspan="4"><? echo $record->spelduur ?></td>
        </tr>
        <tr> 
          <td>Plaats</td>
          <td colspan="4"><? echo $record->plaats ?></td>
        </tr>
        <tr> 
          <td>Materiaal</td>
          <td colspan="4"><textarea cols='100' rows='10' wrap='virtual' 
readonly='true'><? echo $record->materiaal ?></textarea></td>
        </tr>
        <tr> 
          <td>Soort</td>
          <td colspan="4"><? $soort = unserialize($record->soort); ?>
		   <table width="75%" border="0">
                <tr>
            <td><input type="checkbox" value="tik" name="soort[]" <? if 
(is_array($soort)){ if (in_array("tik", $soort)) {print "Checked";}} ?> 
disabled />
              tik</td>
            <td><input type="checkbox" value="denk" name="soort[]" <? if 
(is_array($soort)){ if (in_array("denk", $soort)) {print "Checked";}} ?> 
disabled />
              denk</td>
          </tr>
          <tr>
            <td><input type="checkbox" value="bal" name="soort[]" <? if 
(is_array($soort)){ if (in_array("bal", $soort)) {print "Checked";}} ?> 
disabled />
              bal</td>
            <td><input type="checkbox" value="zoek" name="soort[]" <? if 
(is_array($soort)){ if (in_array("zoek", $soort)) {print "Checked";}} ?> 
disabled />
              zoek</td>
          </tr>
          <tr>
            <td><input type="checkbox" value="kracht" name="soort[]" <? if 
(is_array($soort)){ if (in_array("kracht", $soort)) {print "Checked";}} ?> 
disabled />
              kracht</td>
            <td><input type="checkbox" value="thema" name="soort[]" <? if 
(is_array($soort)){ if (in_array("thema", $soort)) {print "Checked";}} ?> 
disabled />
              thema</td>
          </tr>
          <tr>
            <td><input type="checkbox" value="behendigheid" name="soort[]" 
<? if (is_array($soort)){ if (in_array("behendigheid", $soort)) {print 
"Checked";}} ?> disabled />
              behendigheid</td>
            <td><input type="checkbox" value="anders" name="soort[]" <? if 
(is_array($soort)){ if (in_array("anders", $soort)) {print "Checked";}} ?> 
disabled ?>
              anders</td>
          </tr>
        </table></td>
        </tr>
        <tr> 
          <td>Aantal</td>
          <td colspan="4"><? echo $record->aantal ?></td>
        </tr>
        <tr> 
          <td>Speciaal</td>
          <td colspan="4"><? echo $record->speciaal ?></td>
        </tr>
        <tr> 
          <td>Omschrijving</td>
          <td colspan="4"><textarea cols='100' rows='20' wrap='virtual' 
readonly='true'><? echo $record->omschrijving ?></textarea></td>
        </tr>
      </table>
      <?
}
}
//Einde code = toon
?>

<?
if (isset($_REQUEST["verwijder"]) && $_REQUEST["verwijder"] || isset($_REQUEST["zeker"]) && $_REQUEST["zeker"]) {
  if ($_REQUEST["zeker"] == 'ja'){
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'jroel') {
      DBOpen();
      $query = "DELETE FROM `programma` WHERE `nr` = '".$_REQUEST["spelnr"]."'";
      $result = mysql_query($query) or die (mysql_error());
      echo "Oke, het programma is verwijderd... Niets meer aan te doen...";
	} else {
	  echo "Sorry, je bent geen admin...";
	}
  } else {
    echo "Je bent er nog niet zeker van toch? Zomaar een programma 
weggooien? Als je het toch zeker weet, verander dan de 'zeker=nee' in de 
adresbalk in 'zeker=ja'...";
    }
}
?>
      <?
if (isset($_REQUEST["code"]) && $_REQUEST["code"] == 'invoeren') {

DBopen();

$groepsnr = $_SESSION['groepsnr'];
$speltaknr = $_SESSION['speltaknr'];
$nr = nieuw_programma_nummer();

if (isset($_REQUEST["soort"])){
  $soort=serialize($_REQUEST["soort"]); //Maak een array
} else {
  $soort = "";
}

  //Hier wordt de query gebouwd.
  $query = "INSERT INTO programma ( `nr` , `groepsnr` , `speltaknr` , 
`naam` , `doel` , `spelduur` , `plaats` , `materiaal` , `soort` , `aantal` 
, `speciaal` , `omschrijving`) VALUES($nr, $groepsnr, $speltaknr, '".$_REQUEST["naam"]."', 
'".$_REQUEST["doel"]."', '".$_REQUEST["spelduur"]."', '".$_REQUEST["plaats"]."',
'".$_REQUEST["materiaal"]."', '".$soort."', '".$_REQUEST["aantal"]."', 
'".$_REQUEST["speciaal"]."', '".$_REQUEST["omschrijving"]."')";
  //Hier wordt het programma toegevoegd.
  $result = mysql_query($query) or die("Deze query: 
<b>$query</b><br><br>Deze error:<b>" .mysql_error());
  //Toon dit bericht als het programma is toegevoegd.
  echo "Het programma is toegevoegd! Ga nu weer terug naar <a 
href='index.php'>het hoofdmenu</a>.";

  if (isset($date)) {
    //Hier wordt de datum geformateerd voor MySQL
	$date = explode ("/", $date);
	$unixdate =  mktime ( 0, 0, 0, $date[1], $date[0], $date[2]);
	$datum =  date('Y-m-d',$unixdate);
    //Hier wordt de query gebouwd.
    $query = "INSERT INTO programma_uitvoering ( `programma` , `groepsnr` 
, `datum` , `aantal`) VALUES($nr, $groepsnr, '$datum', 1)";
    //Hier wordt het programma toegevoegd.
    $result = mysql_query($query) or die("Deze query: 
<b>$query</b><br><br>Deze error:<b>".mysql_error());

    //Toon dit bericht als het programma is toegevoegd.
    echo "<br><br>Ook is opgeslagen wanneer dit programma uitgevoerd is! 
Bedankt!";
  }

}
//Einde code = invoeren
?>

<? include ("inc/bottom.php"); ?>