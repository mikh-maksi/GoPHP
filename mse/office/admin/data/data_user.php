﻿<?php if (isset ($prefix))	{$base = $prefix; $base1= $prefix;}		$base .= 'user';	$base_name = 'user';	$base1 .= 'user_in_structure';	$descr = 'Пользователей';	$element = 'Пользоватль';	$element_add = 'пользователя';	$element_create = 'пользователь';	$element_data_change = 'данных пользователей';	$element_data = 'данные пользователя';	$i=0;$name [$i]= 'id'; $i++;$name [$i]= 'login'; $i++;$name [$i]= 'pass'; $i++;$name [$i]= 'sponsor'; $i++;$name [$i]= 'lasname_field'; $i++;$name [$i]= 'firsname_field'; $i++;$name [$i]= 'fathername'; $i++;$name [$i]= 'birthday'; $i++;$name [$i]= 'email'; $i++;$name [$i]= 'skype'; $i++;$name [$i]= 'country'; $i++;$name [$i]= 'postal'; $i++;$name [$i]= 'city'; $i++;$name [$i]= 'region'; $i++;$name [$i]= 'adress'; $i++;$name [$i]= 'hometel'; $i++;$name [$i]= 'mobiltel'; $i++;$name [$i]= 'site'; $i++;$name [$i]= 'regdate'; $i++;$name [$i]= 'status'; $i++;$name [$i]= 'onsite'; $i++;$name [$i]= 'lastaction'; $i++;$name [$i]= 'sessionid'; $i++;$name [$i]= 'sessionid_prev'; $i++;$n=$i-1;$i = 0;$type[$i] = 'int(10)  	auto_increment'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(32)'; $i++;$type[$i] = 'int(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++; $type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'text'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(100)'; $i++;$type[$i] = 'date'; $i++;$type[$i] = 'int(50)'; $i++;$type[$i] = 'int(2)'; $i++;$type[$i] = 'int(20)'; $i++;$type[$i] = 'varchar(50)'; $i++;$type[$i] = 'varchar(50)'; $i++;$pk = 0;$i=0;$name_field [$i]= 'Логин'; $i++;$name_field [$i]= 'Пароль'; $i++;$name_field [$i]= 'Повторите пароль'; $i++;$name_field [$i]= 'Фамилия'; $i++;$name_field [$i]= 'Имя'; $i++;$name_field [$i]= 'Отчество'; $i++;$name_field [$i]= 'Дата рождения'; $i++;$name_field [$i]= 'e-mail'; $i++;$name_field [$i]= 'Skype'; $i++;$name_field [$i]= 'Страна'; $i++;$name_field [$i]= 'Почтовый индекс'; $i++;$name_field [$i]= 'Город'; $i++;$name_field [$i]= 'Область'; $i++;$name_field [$i]= 'Адрес'; $i++;$name_field [$i]= 'Домашний телефон'; $i++;$name_field [$i]= 'Мобильный телефон'; $i++;$name_field [$i]= 'Сайт'; $i++;$name_field [$i]= 'Дата регистрации'; $i++;?>