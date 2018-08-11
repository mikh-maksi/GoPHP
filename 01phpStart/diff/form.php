Get form:<br>
<form action = '' method = 'get'>
  <input type = 'text' name = 'a'>
  <input type = 'submit' value = 'send'>
</form>
Post form:<br>
<form action = '' method = 'post'>
  <input type = 'text' name = 'a'>
  <input type = 'submit' value = 'send'>
</form>
<?php
  $a_get = $_GET['a'];
  $a_post = $_POST['a'];
  $a_request = $_REQUEST['a'];
  echo "GET: ".$a_get."<br>";
  echo "POST: ".$a_post."<br>";
  echo "REQUEST: ".$a_request."<br>";
?>
  
