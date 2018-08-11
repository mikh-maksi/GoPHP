<form action = "" method = "get">
a:<input type = "text" name = "a"><br>
b:<input type = "text" name = "b">
<input type = 'submit' value = 'send'>
</form>

<?php
$b = $_GET['b'];
$a = $_GET['a'];
$c = $a;
$a = $b;
$b = $c;
echo $a;
echo $b;
?>