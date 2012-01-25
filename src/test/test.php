<? include ("../inc/top.php"); ?>

<?
echo ("Ff testen met data van weken<br><br>");
$week = mk_week_to_dates(6,2004);
echo date("D",$week['firstday']);
?>