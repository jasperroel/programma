<? include ("header.php"); ?>
<? include ("functions.php"); ?>

<table width="100%" border="0">
  <tr>
    <td width="10%" valign="top"> <p><a href="<?php echo $baseUri ?>">Home</a><br>
<? if (isset($_SESSION["username"])) { ?>
     <a href="<?php echo $baseUri ?>/session.php?setting=logout" title='Hiermee log je uit en verwijder je de sessions'>Uitloggen</a><br>
<? } ?>
        <a href="<?php echo $baseUri ?>/news.php">Nieuws</a></p>
      <p>Programma:</p>
        <ul>
          <li><a href="<?php echo $baseUri ?>/programma.php?code=toon">Tonen</a></li>

      <li><a href="<?php echo $baseUri ?>/programma.php?code=nieuw">Invoeren</a></li>

    </ul>

    <? if (isset($_SESSION["username"]) && $_SESSION["username"] == 'jroel') { ?>
    <p>Beheer</p>
    <ul>
      <li><a href="<?php echo $baseUri ?>/user.php?action=signup">Inschrijven</a></li>
      <li><a href="<?php echo $baseUri ?>/admin/admin.php?code=groepen">Groepen</a></li>
      <li><a href="<?php echo $baseUri ?>/admin/admin.php?code=speltakken">Speltakken</a></li>
      <li><a href="<?php echo $baseUri ?>/admin/admin.php?code=admin_info">Admin info </a></li>
      <li><a href='<?php echo $baseUri ?>/session.php?setting=remove'>Wis sessies</a></li>
    </ul>

    <? } ?>

    <p><a href="<?php echo $baseUri ?>/about.php">Over...</a></p>
<?
 if (!isset($_SESSION["username"])) {
?>
    <form action='<?php echo $baseUri ?>/user.php' method='post'>
      <table border='0' width='100%' cellspacing='0' cellpadding='1'>
        <tr>
          <td>Gebruikersnaam</td>
        </tr>
        <tr>
          <td><input type='text' name='username' size='14' maxlength='25'></td>
        </tr>
        <tr>
          <td>Wachtwoord</td>
        </tr>
        <tr>
          <td><input type='password' name='password' size='14' maxlength='20'></td>
        </tr>
        <tr>
        <td> <p>
          <input type='hidden' name='op' value='login'>
          <input type='submit' value='Inloggen'>
          <br>
          <font size="-1">Nog steeds niet geregistreerd?<br>
          Klik <a href="<?php echo $baseUri ?>/user.php?action=signup">hier</a>.</font></p>
        </td>
        </tr>
      </table>
    </form>
<?
} else {
  echo "Uw bent ingelogd als <b> ".$_SESSION['username']." </b>";
} ?>
  </td>
    <td valign='top'>
