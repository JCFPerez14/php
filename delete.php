<?php
$user_id = $_REQUEST['id'];
include("class/database.php");

$query_delete = mysqli_query($connections, "SELECT * FROM sir WHERE id='$user_id'");

    while($row = mysqli_fetch_assoc($query_delete)){
        $user_id = $row["id"];
        $db_name = $row["Name"];
        $db_address = $row["Adress"];
        $db_email = $row["Email"];
        $db_section = $row["Section"];
        $db_contact = $row["Contact"];
    }
    echo "<h2>Are you sure you want to delete this record $db_name ?</h2>";
    ?>
    <form method="POST" action="Delete_Now.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        
        <BR>
        <BR>
        <input type="submit" value="YES"> &nbsp; <a href="index.php">NO</a>