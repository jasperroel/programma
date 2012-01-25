<html>  
<body>  
<form method=post action=insert2.php>  
<table border="0" width="100%" bgcolor="#CCCCFF">  
  <tr>  
    <td width="100%"><font color="black" face="Arial"><b>Your   
Schedule for  
<?php   
$this_date = date("F j, Y", mktime(0, 0, 0, $month, $date, $year));   
echo $this_date; ?>  
</b></font></td> 
</table> 
<br> 
<center> 

<?php  

if(mktime(0, 0, 0, $month, $date, $year) < mktime(0, 0, 0, date("m"),   
date("d"), date("Y"))) {  

echo "Display schedule for that date";  

echo "<table border=1>\n";  

echo "<tr bgcolor=#C0C0C0><td>Item</td> 
      <td>Due Date</td> 
      <td>Due Time</td> 
      <td>Days left</td> 
</tr>\n";  
echo "</table>\n";  
echo "</center>";  
}  
else {  

echo"<input type=hidden name=month value=$month> 
<input type=hidden name=date value=$date> 
<input type=hidden name=year value=$year> 

<table border=0 width=100%> 
  <tr> 
    <td colspan=2> 
       <p><b>Enter your ToDo Item</b> 
       </p> 
    </td> 
  </tr>    

  <tr> 
    <td width=20%>ToDo?</td> 
    <td width=80%><input type=text name=todo size=30></td> 
  </tr> 
</table> 

<hr> 

<table border=0 width=100%> 
  <tr> 
    <td width=20%>Time</td> 
    <td width=80%> 
      <input type=text name=hours size=2> 
      <input type=text name=minutes size=2> 
      <font size=-1>(hh/mm)</font> 
    </td> 
  </tr> 
  <tr> 
  </tr> 
</table> 
<hr> 
<center> 
<table> 
  <tr> 
    <td colspan=2 align=center><input type=submit name=submit value=Add>&nbsp<input type=reset name=clear value=Clear> 
    </td> 
  </tr> 
</table> 
</center>";  
}  
?>  
</body> 
</html> 