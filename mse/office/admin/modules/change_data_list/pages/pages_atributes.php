<?

	require_once('../config.php');
	require('data/data_pages_atributes.php');

	mysql_connect($mysql['server'], $mysql['name'], $mysql['pass']);
	mysql_select_db($mysql['db']);

	

//	$base1 = 'pay_acept';
	$nj = 7;	

	$query = "SELECT * FROM $base";
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUMROWS($result);
	
	echo("<b>����� �������:</b> $number	");
	echo ("<table border = 1 cellpadding = 0 cellspacing = 0> <tr>");	
	
	for ($i=0;$i<$nj;$i++)
		{
			echo("<td align = center><b>$tname[$i]</b></td>");
		}
	//����������� � �������������� �������
		echo("<td align = center><b>������</b></td>");
		echo("<td align = center><b>���. ����</b></td>");

	echo("<tr>");

	for ($i=0;$i<$number;$i++)
		{
		$k = $i + 1;
		Echo("<tr>");

		for ($j=0;$j<$nj;$j++)
		{
		$n = $name[$j];
		$data = mysql_result($result,$i,"$n");
		if ($data == '') { $data = '-';}
		Echo("<td align = center>$data</td>");

		}
//		����� �������

		
		echo("<td align = center><a href = 'pages_atributes_edit.php?id=$k'>�������������</a><br>");
		
			}
	
	echo ("</table>");	
	echo ("<p align = center><a href = 'pages_atributes_add.php'>�������� ��������</a></p>");	
	

//	require ("../parts/under.php");




?>