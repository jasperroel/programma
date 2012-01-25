<?
function DBOpen() {
//mysql_connect('mysqlhost', 'gebruikersnaam', 'wachtwoord');
mysql_connect('localhost', 'programma', 'wachtwoord');

//mysql_select_db('databasenaam');
mysql_select_db('programma');
}

function setuser($username) {
  $_SESSION['username'] = $username;
}

function setgroep($groep) {
  //group nr of groepsnaam
  settype($groep, "integer");
  $query = "SELECT * FROM groep WHERE groepsnr = $groep";
  
  DBOpen();
  $result = mysql_query ($query); 
  $row = mysql_fetch_array($result);                     

  $_SESSION['groepsnr'] = $row['groepsnr']; 
  $_SESSION['groep'] = $row['groepsnaam'];  
}
  
function setspeltak($speltak) {
  //speltak nr of naam?
  settype($speltak, "integer");
  $query = "SELECT * FROM speltak WHERE speltaknr = $speltak";
  
  DBOpen();
  $result = mysql_query ($query); 
  $row = mysql_fetch_array($result);                     

  $_SESSION['speltaknr'] = $row['speltaknr']; 
  $_SESSION['speltak'] = $row['speltaknaam']; 
}

function radio_groep() {

  DBOpen();
  $query = "SELECT groepsnr, groepsnaam FROM groep ORDER BY `groepsnr`";
  $resultaat = mysql_query ($query);
  while ($record = mysql_fetch_object($resultaat)){
    echo "<option value='$record->groepsnr'>$record->groepsnaam</option>";
  }
}

function radio_speltak() {

  DBOpen();
  $query = "SELECT speltaknr, speltaknaam FROM speltak ORDER BY `speltaknr`";
  $resultaat = mysql_query ($query);
  while ($record = mysql_fetch_object($resultaat)){
    echo "<option value='$record->speltaknr'>$record->speltaknaam</option>";
  }
}

function nieuw_programma_nummer() {

  DBopen();
  $query = "SELECT MAX(nr) AS nr FROM programma";
  $resultaat = mysql_query ($query);

// MAX_nr in variabele invullen
  $record = mysql_fetch_object($resultaat);
  $nr = $record->nr + 1;
  return $nr;
  
/* Oude code
while ($line = mysql_fetch_array($resultaat, MYSQL_ASSOC)) {
     foreach ($line as $col_value) {
         $max_nr = $col_value;
         $max_nr = $max_nr + 1;
*/
}

function mk_week_to_dates($week, $year){
       //We start some time into prev year
       $searchdate = mktime(0,0,0,12,20,$year-1);
       //Then we advance $week-1 weeks ahead (no need to search through dates we know won't give results)
       $searchdate = strtotime("+".($week-1)." week",$searchdate);

       $found=false;
       while ($found==false){
               if (date("W",$searchdate) == $week)
                       $found = true;
               else
                       $searchdate = strtotime("+1 day",$searchdate);
       }

       $datum['1'] = $searchdate;
       $datum['2'] = strtotime("+1 day",$searchdate);
       $datum['3'] = strtotime("+2 day",$searchdate);
       $datum['4'] = strtotime("+3 day",$searchdate);
       $datum['5'] = strtotime("+4 day",$searchdate);
       $datum['6'] = strtotime("+5 day",$searchdate);	   	   	   	   
       $datum['7'] = strtotime("+6 day",$searchdate);
       return $datum;
}

function statusoverzicht($kop, $bericht, $soort = "standaard"){
//Set Colors
switch($soort) {
  case "standaard":
    $bordercolor = "#000000"; //zwart
	$kopkleur = "#000000"; //zwart
	$berichtkleur = "#000000"; //zwart
    break;
  case "succes":
    $bordercolor = "#66FF00"; //groen
	$kopkleur = "#66FF00"; //groen
	$berichtkleur = "#000000"; //zwart
    break;
  case "error":
    $bordercolor = "#FF0000"; //rood
	$kopkleur = "#FF0000"; //root
	$berichtkleur = "#000000"; //zwart
    break;
  default:
    $bordercolor = "#000000"; //zwart
	$kopkleur = "#000000"; //zwart
	$berichtkleur = "#000000"; //zwart	
} ?>

<table width="200" border="1" cellpadding="3" cellspacing="3" bordercolor="<? echo $bordercolor; ?>">
  <tr>
    <th scope="col"><? echo "<font color='$kopkleur'>$kop</font>"; ?></th>
  </tr>
  <tr>
    <td><? echo "<font color='$berichtkleur'>$bericht</font>"; ?></th>
  </tr>
</table>

<? } ?>