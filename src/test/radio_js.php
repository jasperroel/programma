<html>
<title>CodeAve.com(JavaScript:Radio Button Input)</title>
<body bgcolor="#FFFFFF">

<script language="JavaScript">
function radio_input(url)
{
// Re-direct the browser to the url value
window.location.href = "http://" + url 
}
</script>

<center>

<form>

<input type="radio" name="selectname" 
onClick="JavaScript:radio_input('www.yahoo.com')">
Yahoo.com

<input type="radio" name="selectname" 
onClick="JavaScript:radio_input('www.go.com')">
Go.com

<input type="radio" name="selectname" 
onClick="JavaScript:radio_input('www.altavista.com')">
AltaVista.com

<input type="radio" name="selectname" 
onClick="JavaScript:radio_input('www.altavista.com')">
Lycos.com

</form>

</center>
</body>
</html>