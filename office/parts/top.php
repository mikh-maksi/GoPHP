	<?	
		if (isset ($prefix))
		{
			$base = $prefix;
		}

		$base .= 'user';	
		$result = MYSQL_QUERY("SELECT * FROM $base where login = '$login'");
		$id = mysql_result($result,0,"id");
//Фиксация действия.
	$d = date ("U");


	$query = "UPDATE $base Set $base.lastaction = '$d' where $base.id = $id";
	  mysql_query($query) or DIE(mysql_error());	
?>

	<div class="row menu col-lg-12">
			<div class ="col-lg-3 col-sm-4	col-xs-6" >
			<b><a href = 'main.php'>Главная</a></b><br>
			<a href ='exit.php'>Выход</a>
			</div>
			<div class ="col-lg-3 col-sm-4	col-xs-6" >
				  <?php
	$reportType[] = "Тип звіту";
	$reportType[] = "Бюджет";
	$reportType[] = "ВРП";
	$reportType[] = "Промышленность";
	$reportType[] = "Сельское хозяйство";
	$reportType[] = "ВЭД";
	$reportType[] = "Капітальні інвестиції";
	$reportType[] = "Админуслуги";
	$reportType[] = "Предпринимательство";
	$reportType[] = "Здравоохранение";
	$reportType[] = "Освіта";
	$reportType[] = "Культура ";
	$reportType[] = "Спорт";
	$reportType[] = "Переселенці";
	$reportType[] = "Потребительский рынок";
	$reportType[] = "Рейтинг";
	$reportType[51] = "ЗЕД. Прямі іноземні інвестиції";
	$reportType[52] = "ЗЕД. Прямі іноземні інвестиції по країнам";
	$reportType[53] = "ЗЕД. Експорт товарів";
	$reportType[54] = "ЗЕД. Експорт полуг";
	$reportType[55] = "ЗЕД. Імпорт товарів";
	$reportType[56] = "ЗЕД. Імпорт послуг";
	$reportType[57] = "ЗЕД. Товари";
	$reportType[58] = "ЗЕД. Послуги";
  ?>
  
		<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		Тип отчета <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" role="menu">
	  <?php 
		for($i=1;$i<=15;$i++){
			if ($i==3 || $i==4||$i==7||$i==8||$i==9||$i==11||$i==14||$i==15) continue;
			if ($i!=5)
			echo "<li><a href='test.php?id=$i'>".$reportType[$i]."</a></li>";
			if ($i==5){
				for ($j=1; $j <= 8; $j++) { 
					echo "<li><a href='test.php?id=$i$j'>".$reportType[$i*10+$j]."</a></li>";
					
				}
			}
		}
	  ?>
		
		<li class="divider"></li>

	  </ul>
	</div>

			</div>
			<div class =" col-lg-3 col-sm-4	col-xs-6" >
				<a href = 'faq.php'>Часто задаваемые вопросы</a><br>
				<a href = 'userinf.php'>Изменить свои данные</a><br>
				<a href = 'change_pass.php'>Изменить пароль</a>
			</div>
			<div class ="col-lg-3 col-sm-4	col-xs-6" >
			<p><nobr><b>Ваши данные:</b></nobr><br>
			ID: <?Echo("$id");?><br>
			Логин: <?Echo("$login");?></p>
			

			</div>
	</div>
