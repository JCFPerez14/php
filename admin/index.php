<?php
session_start();

if(isset($_SESSION["id"])){
    $_SESSION["id"] = $user_id;
}


?>