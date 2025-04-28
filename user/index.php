<?php
session_start();

if(isset($_SESSION["id"])){

    $user_id = $_SESSION["id"];
    include("class/database.php");

    $get_record = mysqli_query($connections, "SELECT * FROM sir WHERE id='$user_id'");
    while($row_edit = mysqli_fetch_assoc($get_record)){
        $db_name = $row_edit ["name"];
        $db_address = $row_edit ["Adress"];
        $db_email = $row_edit ["Email"];
    }
    echo "Welcome $db_name !";
}else{
    echo "You must login first! <a href='../logout.php'>Logout!</a>";
}


?>