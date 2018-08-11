<?php
echo "hello word<br>"."<br>";
echo "Valentina<hr>";
$a=3;
echo $a."<br>";
$b=2;
$c=$a+$b;
echo $c;
echo "<hr>";
$a=$_GET['a'];
echo $a."<br>";
$b=$_GET['b'];
echo $b."<br>";
if($a>$b)
{echo"a больше b";}
else
{echo"a не больше b";}
echo "<hr>";
for ($i=1;$i<=10;$i++)
{echo $i." ";}
echo "<hr>";
$i=1;
while ($i<=10)
  {
     echo $i." ";
	 $i++;
  }
echo "<hr>";
$i=1;
do
{
   echo $i." ";
   $i++;
	
} while ($i<=10)
?>