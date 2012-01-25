<form method=get action=test/calender.php>  
  
<?  
if($submit) { 
$tmpd = getdate(mktime(0, 0, 0, $sel_month, 1, $sel_year));  
$month = $tmpd["mon"];   
$fwday= $tmpd["wday"];  
$year = $tmpd["year"];  
$month_textual = $tmpd["month"];
//Omzetting Engels naar Nederlands
$month_textual_nl = strftime("%B", mktime (0,0,0,$month,1,$year));
$month_textual_nl = ucfirst($month_textual_nl);
#$today = date("F, Y");              
echo "<font face='Arial, Helvetica' color = 'red'>";  
echo"<b>$month_textual_nl, $year</b></font>";  
}  
else {  
$month=$sel_month;  
$tmpd = getdate(mktime(0, 0, 0, date("m"), 1, date("Y")));  
$month = $tmpd["mon"];   
$fwday= $tmpd["wday"];  
$year = $tmpd["year"];  
$month_textual = $tmpd["month"];  
echo "<font face='Arial, Helvetica' color ='red'>";  
echo"<b>$month_textual, $year</b></font>";  
}  
echo"<br><br>";  
if($month == 2) {  
    if(($year%4) == 0) {  
        $no_days = 29;  
    }  
    else {  
        $no_days = 28;  
    }  
}  
elseif(($month == 1) || ($month == 3) || ($month == 5) ||    
($month == 7) ||  ($month == 8) ||  ($month == 10) ||  ($month == 12)) {  
    $no_days = 31;  
}  
else {  
    $no_days = 30;  
}  

echo"<table border=1><tr bgcolor='#CCCCFF'>";  
echo"<td>Zon</td><td>Maa</td><td>Din</td><td>Woe</td> 
<td>Don</td><td bgcolor=lightblue>Vri</td><td bgcolor=lightblue>Zat</td>";  
echo"</tr><tr>";  

#$firstday = date("l", mktime(0, 0, 0, 7, 1, 2001)); 

if($fwday == 0) {  
    $index = 1;  
}  
if($fwday == 1) {  
    $index = 2;  
}  
if($fwday == 2) {  
    $index = 3;  
}  
if($fwday == 3) {  
    $index = 4;  
}  
if($fwday == 4) {  
    $index = 5;  
}  
if($fwday == 5) {  
    $index = 6;  
}  
if($fwday == 6) {  
    $index = 7;  
}  

#echo $index; 
$count = 0;  
#$day = date("l", mktime(0, 0, 0, 8, $i, 2001)); 
for($a = 1; $a <= $fwday; $a++) {  
    echo"<td></td>";  
}  
for($i = 1; $i <= (7 - $fwday) ; $i++) {  
echo"<td align=center width=30 height=30>
<a href='programma.php?code=date_set&amp;date=$i/$month/$year'>
$i</a></td>";  
$count++;  
}  
echo"</tr>";  

echo"<tr>";  
for($j = $i; $j <= ($i + 6); $j++) {  
echo"<td align=center width=30 height=30> 
<a href='programma.php?code=date_set&amp;date=$j/$month/$year'>
$j</a></td>";  
}  
echo"</tr>";  

echo"<tr>";  
for($k = $j; $k <= ($j + 6); $k++) {  
echo"<td align=center width=30 height=30>
<a href='programma.php?code=date_set&amp;date=$k/$month/$year'>
$k</a></td>";  
}  
echo"</tr>";  

echo"<tr>";  
for($l = $k; $l <= ($k + 6); $l++) {  
echo"<td align=center width=30 height=30>
<a href='programma.php?code=date_set&amp;date=$l/$month/$year'>
$l</a></td>";  
}  
echo"</tr>";  

echo"<tr>";  
if(($no_days - $l) >= 7) {  
$roll_over = $l + 6;  
}  
for($m = $l; $m <= $roll_over; $m++) {  
echo"<td align=center width=30 height=30> 
<a href='programma.php?code=date_set&amp;date=$m/$month/$year'>
$m </a></td>";  
}  
echo"</tr>";  

echo"<tr>";  

for($n = $m; $n <= $no_days; $n++) {  
echo"<td align=center width=30 height=30>
<a href='programma.php?code=date_set&amp;date=$n/$month/$year'>
$n</a></td>";  
}  
echo"</tr>";  

echo"</table>";  
echo"<hr align='left' width='38%'>";  
?>  
<b>Selecteer de datum om te bekijken/in te voeren</b> 
<table> 
<tr> 
    <td> 
      <select name="sel_year"> 
    <?php  
    $tyear = date("Y");  
    for($i = $tyear; $i < ($tyear+10); $i++)  
          echo"<option value=$i>$i";  
    ?>  
      </select> 
    </td> 
    <td> 
      <select name="sel_month"> 
    <?  
    $tmonth = date("m");  
    for($j = 1; $j <= 12; $j++)  
          echo"<option value=$j>$j";  
    ?>  
      </select> 
    </td> 
    <td><input type=submit name=submit value=Wijzig></td> 
  </tr> 
</table>
</form>