<?php  
if($submit) {  

function validate_input($todo, $hours, $minutes, $urgent) {  

$err_code = 0;   

if(!$todo)  
{  
        echo"<b><font color=red>-Please enter a To-Do item</font></b><br>";  
        $err_code++;  
}  

if(!$hours || !$minutes)  
{  
        echo"<b><font color=red>-Please enter time</font></b><br>";  
        $err_code++;  
}  

return $err_code;  

}  

$result = validate_input($todo, $hours, $minutes, $urgent);  

if($result == 0) {  
    echo "<b><br>$date<br>$month<br>$year<br>$todo<br>$hours<br>$minutes  
    <br></b>";  
    echo"<font color=red><b>Met deze data, kan je doen wat je wilt !</b></font>";  
}  
}  
?>