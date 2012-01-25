<? include ("inc/top.php"); ?>
      <?
// Cookies!
if (isset($sel_groep) && $sel_groep == 'negeer' || isset($sel_speltak) && $sel_speltak == 'negeer') {} else {

  if (isset($setting) && $setting == 'groep') {
    $groepsnr =  $_POST['sel_groep'];
	$_SESSION['groepsnr'] = $groepsnr;
    
	DBopen();
	$query = "SELECT groepsnaam FROM groep WHERE groepsnr = ".$groepsnr;
    $resultaat = mysql_query ($query);

    while ($record = mysql_fetch_object($resultaat)){
      $groep = $record->groepsnaam;
    };
	$_SESSION['groep'] = $groep;
  }

  if (isset($setting) && $setting == 'speltak') {
    $speltaknr = $_POST['sel_speltak'];
	$_SESSION['speltaknr'] = $speltaknr;

	DBopen();
	$query = "SELECT speltaknaam FROM speltak WHERE speltaknr = ".$speltaknr;
    $resultaat = mysql_query ($query);

    while ($record = mysql_fetch_object($resultaat)){
      $speltak = $record->speltaknaam;
    };
	$_SESSION['speltak'] = $speltak;


  }
}

  if (isset($setting) && $setting == 'logout' || isset($setting) && $setting == 'remove') {
/* oude code
	$_SESSION['groep'] = FALSE;
	$_SESSION['speltak'] = FALSE;
*/
    $_SESSION = array(); 
    session_destroy();
   }

echo "
<HTML>
<HEAD>
<TITLE>U wordt terugverwezen...</TITLE>
</HEAD>
<BODY>
";
?>
<CENTER>Uw keuze wordt verwerkt, u keert nu terug naar de vorige pagina.
Indien dit niet gebeurt, klik <a href='index.php'>hier</a> om naar de index pagina te gaan.
</CENTER>
<? print "</BODY></HTML>"; ?>
  <script>window.location="<? echo ("$HTTP_REFERER"); ?>";</script> 
<? include ("inc/bottom.php"); ?>