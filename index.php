<?php

include("class/database.php");

$CompleteName = $CompleteAddress = $EmailAddress = $Section = $Contact = $Password = $CPassword = "";
$CompleteNameErr = $CompleteAddressErr = $EmailAddressErr = $SectionErr = $ContactErr = $PasswordErr = $CPasswordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["CompleteName"])){
        $CompleteNameErr = "Complete Name is required";
    } else{
        $CompleteName = $_POST["CompleteName"];
    }

    if(empty($_POST["CompleteAddress"])){
        $CompleteAddressErr = "Complete Address is required";
    } else{
        $CompleteAddress = $_POST["CompleteAddress"];
    }

    if(empty($_POST["EmailAddress"])){
        $EmailAddressErr = "Email Adress is required";
    } else{
        $EmailAddress = $_POST["EmailAddress"];
    }

    if(empty($_POST["Section"])){
        $SectionErr = "Section is required";
    } else{
        $Section = $_POST["Section"];
    }

    if(empty($_POST["Contact"])){
        $ContactErr = "Contact is required";
    } else{
        $Contact = $_POST["Contact"];
    }

    if(empty($_POST["Password"])){
        $PasswordErr = "Password is required";
    } else{
        $Password = $_POST["Password"];
    }

    if(empty($_POST["CPassword"])){
        $CPasswordErr = "Confirm Password is required";
    } else{
        $CPassword = $_POST["CPassword"];
    }

    if($CompleteName && $CompleteAddress && $EmailAddress && $Section && $Contact && $Password && $CPassword){

        $Check_email = mysqli_query($connections, "SELECT * FROM sir WHERE Email='$EmailAddress'");
        $Check_email_row = mysqli_num_rows($Check_email);

        if($Check_email_row > 0){

            $EmailAddressErr = "Email is alredy registered!";

        }else{
            $query = mysqli_query($connections, "INSERT INTO sir (Name, Adress, Email, Section, Contact, Password, Account_type) 
            VALUES('$CompleteName', '$CompleteAddress', '$EmailAddress', '$Section ', '$Contact', '$CPassword', '2') ");

            echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
            echo "<script>windows.location.href='activity.php';</script>";
        }
    }
}
?>
    <style>
        .error{
            color: red;
        }
    </style>

    <br>
    <?php include("class/navbar.php"); ?>

    <br>
    <br>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        Name: <input type="text" name="CompleteName" placeholder="Complete Name" value="<?php echo $CompleteName; ?>"><br>
            <span class="error"><?php echo $CompleteNameErr; ?></span><br>

        Address: <input type="text" name="CompleteAddress" placeholder="Address" value="<?php echo $CompleteAddress; ?>"><br>
            <span class="error"><?php echo $CompleteAddressErr; ?></span><br>

        Email: <input type="text" name="EmailAddress" placeholder="Email" value="<?php echo $EmailAddress; ?>"><br>
            <span class="error"><?php echo $EmailAddressErr; ?></span><br>
        
        Section: <input type="text" name="Section" placeholder="Section" value="<?php echo $Section; ?>"><br>
            <span class="error"><?php echo $SectionErr; ?></span><br>

        Contact: <input type="text" name="Contact" placeholder="Contact" value="<?php echo $Contact; ?>"><br>
            <span class="error"><?php echo $ContactErr; ?></span><br>

        Password: <input type="password" name="Password" value="<?php echo $Password; ?>"><br>
            <span class="error"><?php echo $PasswordErr; ?></span><br>

        Confirm Password: <input type="password" name="CPassword" value="<?php echo $CPassword; ?>"><br>
            <span class="error"><?php echo $CPasswordErr; ?></span><br>

        <input type="submit" value="Submit">
    </form>
    <hr>
<?php
    

        // $query = mysqli_query($connections, "INSERT INTO sir (Name, Adress, Email, Section, Contact) 
        // VALUES('$CompleteName', '$CompleteAddress', '$EmailAddress', '$Section ', '$Contact') ");

        // echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
        // echo "<script>windows.location.href='activity.php';</script>";

        $view_query = mysqli_query($connections, "SELECT * FROM sir");
        echo "<table  border='1' width ='50%'>";
        echo"<tr>
                <td>Name</td>
                <td>Adress</td>
                <td>Email</td>
                <td>Section</td>
                <td>Contact</td>
                <td>Option</td>
            </tr>";
        while($row = mysqli_fetch_assoc($view_query)){
            $user_id = $row["id"];
            
            $db_name = $row["Name"];
            $db_address = $row["Adress"];
            $db_email = $row["Email"];
            $db_section = $row["Section"];
            $db_contact = $row["Contact"];

            echo "<tr>
                    <td>$db_name</td>
                    <td>$db_address</td>
                    <td>$db_email</td>
                    <td>$db_section</td>    
                    <td>$db_contact</td>
                    <td>
                    <a href='edit.php?id=$user_id'>Update</a>
                    &nbsp;
                    <a href='delete.php?id=$user_id'>Delete</a>
                    </td>

                </tr>";
        }

        echo "</table>"
?>

<hr>
<?php

$Paul = "Paul";
$Mica = "Mica";
$Kaye = "Kaye";

$names = array("Paul", "Mica", "Kaye");
foreach($names as $display_names){
    echo $display_names . "<br>";
}


?>