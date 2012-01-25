<? include ("inc/top.php"); ?>
      <h1 align='center'><img src="/scouts/afbeeldingen/Scouting Logo.gif" alt="Scouting Logo" width="75" height="66" align="middle">PHProgramma</h1>
      <p align="left">Welkom bij PHProgramma, het online scouting programma overzicht. 
        PHProgramma probeert te voorzien in een consistente en prettige omgeving 
        waarbinnen personen en groepen hun scoutingprogramma kunnen opslaan.</p>
      <p align="left">Deze site is bedoeld voor leiding van Scouting wie hun programma 
        graag digitaal willen bijhouden. Deze site bied tevens de mogelijkheid 
        van andere speltakken / groepen de programma's in te zien en/of te gebruiken. 
        Deze site is mijn eerste poging op een site zelf te bouwen met behulp 
        van <strong><a href="http://www.php.net" target="_blank">PHP</a></strong> 
        en <strong><a href="http://www.mysql.com" target="_blank">MySQL</a></strong>, 
        dus verwacht niet te veel :)</p>
      <p>&nbsp;</p>
	  <? if (isset($_SESSION['username'])) { ?>
      <table width="100%" border="0">
        <tr> 
          <td>Selecteer de gewenste groep: </td>
          <td width="70%"><form action="session.php?setting=groep" method="post" target="_self">
              <select name="sel_groep" id="select">
                <option value='negeer' selected>Kies hier je groep...</option>
                <? radio_groep() ?>
              </select>
              <input type="submit" name="Submit" value="Deze!">
              <em>Huidige groep is:</em> 
        <?
		  $groep =  $_SESSION['groep'];
          if ($groep == NULL) {
		    echo "<b>Geen selectie</b>";
		  } else {
		    echo "<b>$groep</b>";
		  }
		      ?>
            </form></td>
        </tr>
        <tr> 
          <td>Selecteer de gewenste speltak:</td>
          <td><form action="session.php?setting=speltak" method="post" target="_self" id="frmSelecteerSpeltak">
              <select name="sel_speltak" id="select2">
                <option value='negeer' selected>Kies hier je speltak...</option>
		<? radio_speltak() ?>
              </select>
              <input name="Submit" type="submit" id="Submit" value="Deze!">
              <em>Huidige speltak is:</em> 
        <?
		  $speltak = $_SESSION["speltak"];
          if ($speltak == NULL) {
		    echo "<b>Geen selectie</b>";}
		  else {
		    echo "<b>$speltak</b>";
		  }
        ?>
            </form></td>
        </tr>
      </table>
      <? } ?>
      <? include ("inc/bottom.php"); ?>