<form action = "" method = "get">
    <input type="text" name = "a">
    <input type="text" name = "b">
    <input type="submit" value = "send">
</form>

<?php
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $a + $b;
    echo $c;
?>