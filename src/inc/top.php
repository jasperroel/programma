<? include ("header.php"); ?>
<? include ("functions.php"); ?>

<table width="100%" border="0">
  <tr>
    <td width="10%" valign="top"> <p><a href="/programma/">Home</a><br>
<? if (isset($_SESSION["username"])) { ?>
     <a href='/programma/session.php?setting=logout' title='Hiermee log je uit en verwijder je de sessions'>Uitloggen</a><br>
<? } ?>
        <a href="/programma/news.php">Nieuws</a></p>
      <p>Programma:</p>
        <ul>
          <li><a href="/programma/programma.php?code=toon">Tonen</a></li>

      <li><a href="/programma/programma.php?code=nieuw">Invoeren</a></li>

    </ul>

    <? if (isset($_SESSION["username"]) && $_SESSION["username"] == 'jroel') { ?>
    <p>Beheer</p>
    <ul>
      <li><a href="/programma/user.php?action=signup">Inschrijven</a></li>
      <li><a href="/programma/admin/admin.php?code=groepen">Groepen</a></li>
      <li><a href="/programma/admin/admin.php?code=speltakken">Speltakken</a></li>
      <li><a href="/programma/admin/admin.php?code=admin_info">Admin info </a></li>
      <li><a href='/programma/session.php?setting=remove'>Wis sessies</a></li>
    </ul>

    <? } ?>

    <p><a href="/programma/about.php">Over...</a></p>
<?
 if (!isset($_SESSION["username"])) {
?>
    <form action='/programma/user.php' method='post'>
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
          Klik <a href="/programma/user.php?action=signup">hier</a>.</font></p>
        </td>
        </tr>
      </table>
    </form>
<?
} else {
  echo "Uw bent ingelogd als <b> ".$_SESSION['username']." </b>";
} ?>

      <p>
<!-- Begin Nedstat Basic code -->
<!-- Title: Scouting Programma -->
<!-- URL: http://roothaan.xs4all.nl/programma -->
<script language="JavaScript" type="text/javascript" src="http://m1.nedstatbasic.net/basic.js">
</script>
<script language="JavaScript" type="text/javascript" >
<!--
  nedstatbasic("ACelzwQsJ1eehDDje+ZkaLKC+q2Q", 0);
// -->
</script>
<noscript>
<a target="_blank" href="http://v1.nedstatbasic.net/stats?ACelzwQsJ1eehDDje+ZkaLKC+q2Q">
<img src="http://m1.nedstatbasic.net/n?id=ACelzwQsJ1eehDDje+ZkaLKC+q2Q" border="0" nosave width="18" height="18"
alt="Nedstat Basic - Free web site statistics"></a>
</noscript>
<!-- End Nedstat Basic code --></p>
  </td>
    <td valign='top'>
