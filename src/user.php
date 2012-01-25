<? include ("inc/top.php") ?>

<?
  if (isset($_REQUEST["op"]) && $_REQUEST["op"] == 'login') {
    DBOpen();
    if ($_POST['username'] == '') { 
      echo "<font color=#ff0000>Je bent je gebruikersnaam vergeten in te vullen...</font>";} 
    else {
	  $username = mysql_escape_string(strip_tags( $_POST['username']));
      if ($_POST['password'] == '') { 
        echo "<font color=#ff0000>Je bent je wachtwoord vergeten in te vullen...</font>";
      } else {
	    $pw = mysql_escape_string(strip_tags( $_POST['password']));
        $query = "SELECT * FROM gebruikers WHERE user_name = '$username'";
	    $result = mysql_query ($query); 
	    $row = mysql_fetch_array($result);                     
		$dbpass = $row['user_pass']; 
		$pw = md5($pw); 
        if ($dbpass <> $pw) {
		  echo "<font color=#ff0000>Fout wachwoord, probeer opnieuw!</font>";
		} else {
		  $groepsnr = $row['groepsnr'];
		  $speltaknr = $row['speltaknr'];
          setuser		($username);
		  setgroep		($groepsnr);
		  setspeltak	($speltaknr);
          echo "
          <HTML>
          <HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='3; URL=index.php'>
          <TITLE>U wordt ingelogd...</TITLE>
          </HEAD>
          <BODY><CENTER>U wordt ingelogd, even geduld, u keert nu terug naar de vorige pagina.
          Indien dit niet gebeurt, klik <a href='index.php'>hier</a>.</CENTER></BODY></HTML>";
	    } 
      } 
    } 
  }   
//Einde login
?>

<?
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "dbinvoeren"){
  $username =	mysql_escape_string(strip_tags($_POST['username']));
  $password =	mysql_escape_string(strip_tags($_POST['password']));
  $email	=	mysql_escape_string(strip_tags($_POST['email']));
  $groep	=	mysql_escape_string(strip_tags($_POST['groep_select']));
  $speltak	=	mysql_escape_string(strip_tags($_POST['speltak_select']));

  echo "<font size=4>Inschrijven</font><br><br>"; 
    if ($username == ''){ 
      echo "<font color=#ff0000>Je bent je gebruikersnaam vergeten in te vullen...</font>"; 
    } else { 
      if ($email == ''){ 
        echo "<font color=#ff0000>Je bent je e-mailadres vergeten in te vullen...</font>"; 
      } else { 
        if ($password == ''){ 
          echo "<font color=#ff0000>Je bent je wachtwoord vergeten in te vullen...</font>"; 
        } else {

          DBOpen();
		  $pw = md5($password);
		  $query = "
		  INSERT INTO gebruikers (
		    user_name,
			user_pass,
			user_mail,
			groepsnr,
			speltaknr)
		  VALUES (
		    '$username',
			'$pw',
			'$email',
			$groep,
			$speltak)";
		echo $query;

          mysql_query($query) or die(mysql_error()); 
          echo ("Je bent nu geregistreerd onder de naam '$username'. Je wachtwoord is '$password'. Onthou deze goed, sinds hij versleuteld in het systeem staat.<br>Klik <a href='index.php'>hier</a> om terug te keren naar het hoofdscherm.");
        } 
      } 
    } 
  }
?>
<? if (isset($_GET["action"]) && $_GET["action"] == "signup") { ?>
<form action= <? print $_SERVER['PHP_SELF']  ?> method="post">
  <table width='100%' border='0'>
    <tr> 
      <td width='10%'> <p>
        Gebruikersnaam:</p>        </td>
      <td width='90%'><input name=username type=text size="24" maxlength=10> 
        *</td>
    </tr>
    <tr> 
      <td>Wachtwoord:</td>
      <td><input name=password type=password size="24" maxlength=15>
        *</td>
    </tr>
    <tr> 
      <td>E-mailadres:</td>
      <td><input name=email type=text size="24">
        *</td>
    </tr>
    <tr> 
      <td>Groep:</td>
      <td><select name="groep_select" id="groep_select">
        <option value="negeer" selected>Kies hier je groep...</option>
		<? radio_groep() ?>
      </select></td>
    </tr>
    <tr>
      <td>Speltak:</td>
      <td><select name="speltak_select" id="speltak_select">
        <option value="negeer" selected>Kies hier je speltak...</option>
        <? radio_speltak() ?>
      </select></td>
    </tr>
    <tr>
      <td colspan=2><p>
        <input name="action" type="hidden" id="action" value="dbinvoeren">
        <input name='submit' type=submit value=Inschrijven!>
          <input name='reset' type=reset value=Opnieuw>
      </p>
        <p>* Verplicht         </p></td>
    </tr>
  </table>
  </form>
<?
  } 

//Einde signup  
?>
<? include ("inc/bottom.php") ?>