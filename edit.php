<?php
    $user_id = $_REQUEST["id"];
        include("class/database.php");    
        $get_record = mysqli_query($connections, "SELECT * FROM sir WHERE id='$user_id'");
        while($row_edit = mysqli_fetch_assoc($get_record)){
            echo $db_name = $row_edit["Name"];
            echo $db_address = $row_edit["Adress"];
            echo $db_email = $row_edit["Email"];
            echo $db_section = $row_edit["Section"];
            echo $db_contact = $row_edit["Contact"];
        }
?>
<form method="POST" action="Update_Record.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="text" name="new_Name" value="<?php echo $db_name?>">
    <br>
    <input type="text" name="new_Adress" value="<?php echo $db_address?>">
    <br>
    <input type="text" name="new_Email" value="<?php echo $db_email?>">
    <br>
    <input type="text" name="new_Section" value="<?php echo $db_section?>">
    <br>
    <input type="text" name="new_Contact" value="<?php echo $db_contact?>">
    <br>

    <input type="submit" value="Update">

</form>