<?php
  $a=$_GET['a'];
  $b=$_GET['b'];
  $act=$_GET['act'];
  if ($act == '+') {$c = $a+$b;}
  if ($act == '-') {$c = $a-$b;}
  if ($act == '*') {$c = $a*$b;}
  if ($act == '/') {$c = $a/$b;}
?>

<form action = '' method = 'get'>
  <input type = 'text' name = 'a'> a<br>
  <input type = 'text' name = 'act'> action<br>
  <input type = 'text' name = 'b'> b<br>
  result:<?php echo $c; ?><br>
  <input type = 'submit' value = 'send'>
</form>