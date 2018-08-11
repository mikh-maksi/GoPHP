<?php
session_start(); //старт сессии
header('Content-Type: text/html; charset=utf-8'); 
//в заголовках передаем кодировку utf-8

if (isset($_GET['out'])){ //если передавали параметр  out методом get
    if ($_GET['out']==1){ //если значение элемента с индесом out суперглобального массива get равно 1
        unset ($_SESSION['auth']);   
        //разрушаем сессионную переменную  $_SESSION['auth']  
        header('Location: index.php');
        //отправляем заголовок Location: index.php (редирект на страницу index.php)
    }
}

    if ($_SESSION['auth']==1){ //если сессионная переменная auth равна 1 
        ?>
            <p>Login: <?php echo $_SESSION['auth'];?></p>
            <p>Секретный текст для авторизированных пользователей.</p>
            <p><a href="?out=1">Выход</a></p> 
            <!--Ссылка на разлогинивание-->
        <?php
    }else{

    if (!isset($_POST['login'])){ //если не отправляли логин
?>
<form action="" method = "post">
    <input type="text" name = "login">
    <input type="password" name = "password">
    <input type="submit">
</form>
<?php
    }else
    {
        $login = "max";
        $pass = "123";

        if (($_POST["login"]==$login)&&($_POST["password"]==$pass)){    
            //Если введенный логин и пароль соотретствуют заданным
            $_SESSION['auth']=1; //Сессионную переменную auth делаем равной 1
            ?>
            <p>Login: <?php echo $_SESSION['auth'];?></p>
            <p><a href="?out=1">Выход</a></p>
            <?php
        }else{
            ?>
                логин и пароль - не верные.
                
<form action="" method = "post">
    <input type="text" name = "login">
    <input type="text" name = "password">
    <input type="submit">
</form>
            <?php
        }
    }
}

?>