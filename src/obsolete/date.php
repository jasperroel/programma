<?
if ($code == nieuw) {
?>
      <h1>Programma invoeren</h1>
      <p>Dit programma is voor de <strong> 
        <? $speltak = $_SESSION['speltak'];
            if ($speltak == NULL) { 

echo ("		  <form action='session.php' method='post' name='frmSelecteerSpeltak' target='_self'>
              <select name='sel_speltak' id='select2'>
                <option value='negeer' selected>Kies hier je speltak...</option>");

                include ("http://roothaan.xs4all.nl/programma/dbconnect.php?code=speltak_select");

echo ("       </select>
              <input name='setting' type='hidden' value='speltak'>
              <input name='oude_url' type='hidden' value='$fullCurrentURL'>
              <input name='Submit' type='submit' id='Submit' value='Deze!'> </form>");
		} else {
		  echo $speltak;
		  }
          ?>
        </strong></p>
      <form name="form1" method="post" action="">
        <p>Voor welke datum is dit programma?</p>
        <p>
          <? //Start Zaterdag opkomsten
if ($_SESSION['speltaknr'] == 3 || $_SESSION['speltaknr'] == 4 || $_SESSION['speltaknr'] == 5){ ?>
          
        <input type="radio" name="radiobutton" onClick="JavaScript:volg_url('')">
        Vorige week vrijdag (<b> 
        <?
     echo strftime("%d/%m", strtotime("Friday last week")); 
     ?>
        </b>)<br>
          <?
     if (strftime ("%u") == 5){ ?>
          <input type="radio" name="radiobutton">
          Vandaag (<b><? echo strftime ("Friday"); ?></b>)<br>
          <?
   } else {
     if (strftime ("%u") < 5){ ?>
          <input type="radio" name="radiobutton">
          Aankomende vrijdag (over 
          <? $diff = 5 - strftime ("%u"); echo $diff; ?>
          dag<? 
         if ($diff <> 1){echo "en";}?>
          ) (<b><? echo strftime("%d/%m", strtotime("Friday")); ?></b>) <br>
          <? } else { ?>
          <input type="radio" name="radiobutton">
          Afgelopen vrijdag (van 
          <? $diff = strftime ("%u") - 5; echo $diff; ?>
          dag<? 
         if ($diff <> 1) { echo "en";}?>
          geleden) (<b><? echo strftime("%d/%m", strtotime("Friday")); ?></b>)<br>
          <? } } ?>
          <input type="radio" name="radiobutton">
          Volgende week vrijdag (<b><? echo strftime("%d/%m", strtotime("Friday next week")); 
	 ?></b>) </p>
        
      <p> 
        <?
	 //Einde vrijdagopkomsten...
     } else {
	 //Start Zaterdagopkomsten
	 if ($_SESSION['speltaknr'] == 1 || $_SESSION['speltaknr'] == 2){?>
        <input type="radio" name="radiobutton">
        Vorige week zaterdag (<b> 
        <?
        
     echo strftime("%d/%m", strtotime("Saturday last week")); 
     
        ?>
        </b>)<br>
        <?
     if (strftime ("%u") == 6){ ?>
        <input type="radio" name="radiobutton">
        Vandaag (<b><? echo strftime ("Saterday"); ?></b>) <br>
        <?
   } else {
     if (strftime ("%u") < 6){ ?>
        <input type="radio" name="radiobutton">
        Aankomende zaterdag (over 
        <? $diff = 6 - strftime ("%u"); echo $diff; ?>
        dag
        <?
         if ($diff <> 1){echo "en";}
        ?>
        ) (<b><? echo strftime("%d/%m", strtotime("Saturday")); ?></b>) <br>
        <? } else { ?>
        <input type="radio" name="radiobutton">
        Afgelopen zaterdag (van 1 dag geleden) (<b><? echo strftime("%d/%m", strtotime("Saturday")); ?></b>)<br>
        <? } } ?>
        <input type="radio" name="radiobutton">
        Volgende week zaterdag (<b><? echo strftime("%d/%m", strtotime("Saturday next week")); ?></b>) 
        <? //Einde vrijdagopkomsten... 
    }
    else { echo $_SESSION['speltaknr'];} } ?>
      </p>
        <p> 
          <input type="radio" name="radiobutton">
          Anders, namelijk:</p>
<table width="40%" border="1">
  <tr>
    <td align="center">
      <? include ("../test/calender.php"); ?>
	</td>
  </tr>
</form><?
}
//Einde code = date
?>