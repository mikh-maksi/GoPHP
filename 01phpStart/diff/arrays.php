<?php
  $aa[0]=10;
  $aa[1]=11;
  $aa[2]=12;
  $bb[]=20;
  $bb[]=21;
  $bb[]=22;
  $cc['zero']=30;
  $cc['one']=31;
  $cc['two']=32;
  
  for($i=0;$i<=2;$i++)
  {
	  echo $aa[$i]."<br>";
  }
  
  $i=0;
  echo "<hr>";
  while ($i<count($bb))
  {
	echo $bb[$i]."<br>";
	$i++;
  }
  echo "<hr>";
  foreach ($cc as $key => $value)
  {
	  	  echo $key." ".$value."<br>";
  }
  