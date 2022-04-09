<?php
include 'core/kernel.php';
require_login();
global $dbcon;

initDatabase();
 
$message = $_POST['message'];



if($message != "")
{
 $sql = "INSERT INTO cr_chat_mensajes (mensaje) VALUES('$message')";
 mysqli_query($dbcon, $sql);
}
 
$sql2 = "SELECT * FROM cr_chat_mensajes ORDER BY 'timestamp'";
$result = mysqli_query($dbcon, $sql2);
while(($row = mysqli_fetch_row($result))==true) {
echo $row[3].'<br>' ;
}

closeDatabase();

?>

<textarea id="screen" cols="40" rows="10"> </textarea> <br>  
<input id="message" size="40">
<button id="button"> Send </button>

<script>
 
function update()
{
    $.post("server", {}, function(data){ $("#screen").val(data);});  
 
    setTimeout('update()', 1);
}
 
$(document).ready(
 
function() 
    {
     update();
 
     $("#button").click(    
      function() 
      {         
       $.post("server", 
    { message: $("#message").val()},
    function(data){ 
    $("#screen").val(data); 
    $("#message").val("");
    }
    );
      }
     );
    });
 
 
</script>