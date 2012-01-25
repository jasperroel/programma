<?
//Voor het inloggen, vasthouden van gegevens (zoals groep, speltak etc)
session_start();
header('Cache-control: private'); // IE6 Fix

//Debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Weet waar je bent :)
$currentURL = $_SERVER['REQUEST_URI'];
$fullCurrentURL = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$baseUri = "/projects/programma";

//Om de tijd/data etc in het Nederlands weer te geven
setlocale (LC_ALL, 'nl_NL');

//Om te zorgen voor een consistente layout en juiste koppen!
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<META HTTP-EQUIV='Expires' CONTENT='Fri, Jan 01 1900 00:00:00 GMT'>
<META HTTP-EQUIV='Pragma' CONTENT='no-cache'>
<META HTTP-EQUIV='Cache-Control' CONTENT='no-cache'>
<META http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<META http-equiv='content-language' content='nl'>
<META name='author' content='Jasper Roel'>
<META HTTP-EQUIV='Reply-to' CONTENT='jasperroelNOSPAM@yahoo.com'>
<META NAME='description' CONTENT=''>
<META name='keywords' content=''>
<META NAME='Creation_Date' CONTENT='07/03/2003'>
<title>Generaal Roothaan 'Programma' | Home</title>

<!-- <link rel='stylesheet' type='text/css' href='my.css'> -->

</head>
<body bgcolor='#F6F7EB'>

<script language='JavaScript' type='text/javascript'>
function volg_url(url)
{
// Code voor de functie 'volg_url'
  //oud window.location.href = 'http://' + url 
//nieuw
window.location.href = url 
}
</script>