<?	require('../config.php');
	
	require('data/data_autoparts_category.php'); //����� - ������ ������� �� ��. ������� - Id/���/��������/����/���
	
	mysql_connect($mysql['server'], $mysql['name'], $mysql['pass']);
	mysql_select_db($mysql['db']);



	
	$nid = $_POST['nid'];
	
	$result = MYSQL_QUERY("SELECT * FROM $base where id = '$nid'");
	$id = mysql_result($result,0,"id");


	
	$query = "SELECT * FROM $base where id = $id" ;
	$result = MYSQL_QUERY($query);
	
	
	For ($i=1;$i<=$n;$i++)
		{
			$fieldname = $name[$i];
			$value[$i] = $_POST["$fieldname"];
			$hits= $_POST['hits'];
		}
	
	$query = "UPDATE $base Set ";
		for ($i=1;$i<=$n;$i++)
			{
			if ($i == $n)
				{
					$query .= "$base.";
					$query .= "$name[$i] = ";
					$query .= "'$hits'";
				}
				else
				{
					$query .= "$base.";
					$query .= "$name[$i] = ";
					$query .= "'$value[$i]', ";
				}
			}
		 $query .= "where $base.id = $id";
		
    mysql_query($query) or DIE(mysql_error());

	echo("<p align = center><b>��������� ����������� �������.</b><br>
		</p>");
	echo("<table align = center border = 1 cellpadding = 0 cellspacing = 0>
	<tr><td colspan = 2 align = center><b>���� ��������������� ������</b></td>");
	for ($i=3;$i<=$n;$i++)
		{
			Echo("<tr><td align = right><b>$tname[$i]:</b></td><td align = left> $value[$i]<td>");
		}
	echo("
	
		<tr><td colspan = 2 align = center><b><a href = 'autoparts_category.php'>��������� �� �������� ���. ���������</a></b></td>
	</table>");
	
	
?>