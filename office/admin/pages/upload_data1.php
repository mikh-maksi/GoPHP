<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>AJAX загрузка файла на сервер с помощью jQuery...</title>
	
		<style>.wrapper{ text-align: center; margin:2em; }</style>
			
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
	</head>


<body>
<?php
$files[] = 'budjet.csv';
$files[] = 'pereselenci.csv';
$files[] = 'proizv.csv';
$files[] = 'sport.csv';
$files[] = 'ved_direct_investment.csv';
$files[] = 'ved_direct_investment_county.csv';
$files[] = 'ved_export_goods.csv';
$files[] = 'ved_export_services.csv';
$files[] = 'ved_goods.csv';
$files[] = 'ved_import_goods.csv';
$files[] = 'ved_import_services.csv';
$files[] = 'ved_rf.csv';
$files[] = 'ved_services.csv';
$files[] = 'vrp.csv';
?>
	<table>

<?php
$i = 0;
foreach($files as $key => $value)
{
	echo "<tr><td>";
	if (file_exists("uploads/".$value)){
		echo "+";
	}
	else{
		echo "-";
	}
	echo $value."</td><td><a href = upload_data2.php?n=".$i."> Загрузить</a> </td>";
	$i++;
}
?>

	<div class="wrapper">
		<input type="file" multiple="multiple" accept=".txt,image/*">
		<a href="#" class="submit button">Загрузить файлы</a>
		<div class="ajax-respond"></div>
	</div>
	
<script>
(function($){
// Автор: Тимур Камаев, http://wp-kama.ru/

// Глобальная переменная куда будут располагаться данные файлов. С не будем работать
var files;

// Вешаем функцию на событие
// Получим данные файлов и добавим их в переменную
$('input[type=file]').change(function(){
	files = this.files;
});


// Вешаем функцию ан событие click и отправляем AJAX запрос с данными файлов
$('.submit.button').click(function( event ){
	event.stopPropagation(); // Остановка происходящего
	event.preventDefault();  // Полная остановка происходящего

	// Содадим данные формы и добавим в них данные файлов из files
	var data = new FormData();
	$.each( files, function( key, value ){
		data.append( key, value );
	});

	// Отправляем запрос
	$.ajax({
		url: './submit.php?uploadfiles',
		type: 'POST',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false, // Не обрабатываем файлы (Don't process the files)
		contentType: false, // Так jQuery скажет серверу что это строковой запрос
		success: function( respond, textStatus, jqXHR ){
			// Если все ОК
			if( typeof respond.error === 'undefined' ){
				// Файлы успешно загружены, делаем что нибудь здесь

				// выведем пути к загруженным файлам в блок '.ajax-respond'
				var files_path = respond.files;
				var html = '';
				$.each( files_path, function( key, val ){ html += val +'<br>'; } )
				$('.ajax-respond').html( html );
			}
			else{
				console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
			}
		},
		error: function( jqXHR, textStatus, errorThrown ){
			console.log('ОШИБКИ AJAX запроса: ' + textStatus );
		}
	});
	
});


})(jQuery)
</script>

</body>
</html>




