<?php 
    session_start();
    if (isset($_SESSION['count'])){
        unset ($_SESSION['count']);
    }
    header('Location: count.php');
?>