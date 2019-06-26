<?php 
    session_name("sessionWeb");
    session_start();
    session_destroy();
    header("Location: index.php");
?>