<?php
    session_start();
    $_SESSION['page'] = "index";
    echo $_SESSION['page'];
?>