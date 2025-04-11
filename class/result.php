<?php
include("database.php");
if(empty($_GET['search'])){
    echo "Walang laman ang search box!";
}
else{
    $check = $_GET['search'];
    $terms = explode(" ", $check);
    $q = "SELECT * FROM sir WHERE ";
    $i = 0;

    foreach($terms as $each){
        $each = trim($each);
        $i++;
        if($i == 1){
            $q .= "Name LIKE '".$each."%'";
        } else{
            $q .= " OR Name LIKE '".$each."%'";
        }
    }
    $query = mysqli_query($connections, $q);
    $c_q = mysqli_num_rows($query);
    if($c_q > 0 && $check!=""){
        while($row = mysqli_fetch_assoc($query)){
            echo $Name = $row["Name"] . "<br>";
        }
    } else{
        echo "Walang record na natagpuan!";
    }
}