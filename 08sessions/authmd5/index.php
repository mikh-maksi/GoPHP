<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
if (isset($_GET['out'])){
    if ($_GET['out']==1){
        unset ($_SESSION['auth']);      
        header('Location: index.php');
    }
}
    if ($_SESSION['auth']==1){
        ?>
            <p>Login: <?php echo $_SESSION['auth'];?></p>
            <p><a href="?out=1">Выход</a></p>
        <?php
    }else{

    if (!isset($_POST['login'])){
?>
<form action="" method = "post">
    <input type="text" name = "login">
    <input type="text" name = "password">
    <input type="submit">
</form>
<?php
    }else
    {
        $login = "max";
        $hash = md5("123");
        
        if (($_POST["login"]==$login)&&(md5($_POST["password"])==$hash)){    
            $_SESSION['auth']=1;?>
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