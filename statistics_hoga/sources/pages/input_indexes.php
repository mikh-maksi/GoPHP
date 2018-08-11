<?php
    header('Content-Type: text/html; charset=utf-8');
    include "config.php";
    include "connect.php";
    
    $sql = "TRUNCATE indexes";
    if ($link->query($sql) === TRUE) {} else { echo "Error: " . $sql . "<br>" . $link->error;}
    $sql = "TRUNCATE `indexesSpheres`";
    if ($link->query($sql) === TRUE) {} else { echo "Error: " . $sql . "<br>" . $link->error;}    
    $sql = "TRUNCATE intervals";
    if ($link->query($sql) === TRUE) {} else { echo "Error: " . $sql . "<br>" . $link->error;}

	$fp = fopen('csv/indexes.csv', 'r');
    $flag = -1;
    $year = 2009;
    $month = 0;
    $cout = 0;
	if ($fp) 
		{
		while (!feof($fp))
		{

        $mytext = fgets($fp, 999);
        $flag++;
		if ($flag<2){ continue;}
		$mytext = iconv('windows-1251', 'utf-8', $mytext);
		$mytext = str_replace(",", ".",$mytext );
		$out = split (";", $mytext);
      //  echo $mytext."<br />";
        
        $flag1 = -2;
     //  $cout =0;
        foreach($out as $key => $value){
            $flag1++;

            if ($flag1<1){
                if ($flag1==0){
                    if ($cout>=1 && $cout<=12){
                        $sql = "INSERT INTO `intervals` (name) VALUES ('$value')";
                        if ($link->query($sql) === TRUE) {  } else {echo "Error: " . $sql . "<br>" . $link->error; }
                    }
                    $cout++;
                }
                continue;}
            echo $value." ";


             if ($flag == 2){
                $sql = "INSERT INTO `indexesSpheres` (name) VALUES ('$value')";
            }
            else{
                $sql = "INSERT INTO indexes (type, year, month, value)
                VALUES ($flag1, $year,$month,$value)";
            }
            if ($link->query($sql) === TRUE) {  } else {echo "Error: " . $sql . "<br>" . $link->error; }
        }
        echo "<br>";
        /*
        */
		//$query = 'INSERT INTO ved_direct_investment (year , direct_investment_in,direct_investment_out) VALUES ('.$out[0].','.$out[1].','.$out[2].')';
		//echo $query;
        //mysql_query($query) or DIE(mysql_error()); //выполнение запроса
        
        $month++;
        if ($month == 13){
            $month = 1;
            $year++;
        }

		}
		}
		else echo "Ошибка при открытии файла";
		fclose($fp);
	
        $link->close();

	
	
	
	
?>
  <b>Новые записи добавлены успешно</b>
  <br> <a href = 'select.php'>Вернуться на страницу вывода данных</a>
