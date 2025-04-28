<?php
$EmailAddress = $Password = "";

$EmailAddressErr = $PasswordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {


    if(empty($_POST["EmailAddress"])){

        $EmailAddressErr = "Email Adress is required";

    } else{

        $EmailAddress = $_POST["EmailAddress"];

    }
    
    if(empty($_POST["Password"])){

        $PasswordErr = "Password is required";

    } else{

        $Password = $_POST["Password"];

    }

    if($EmailAddress && $Password){

        include("class/database.php");

        $Check_email = mysqli_query($connections, "SELECT * FROM sir WHERE Email='$EmailAddress'");
        $Check_email_row = mysqli_num_rows($Check_email);
        
        if($Check_email_row > 0){

            if($Check_email_row > 0){
                while($row = mysqli_fetch_assoc($Check_email)){

                    $user_id = $row["id"];

                    $db_password = $row["Password"];
                    $db_account_type = $row ["Account_type"];

                    if($Password == $db_password){

                        session_start();
                        $_SESSION["id"] = $user_id;

                        if($db_account_type == "1"){
                            echo "<script>window.location.href='admin';</script>";
                        }else{
                            echo "<script>window.location.href='user';</script>";
                        }

                    }else{
                        $PasswordErr = "Password is incorrect!";
                    }
                }
            }

        }else{
            $EmailAddressErr = "Email is not registered!";
        }
    }
}

?>

<style>
    .error{
        color: red;
    }
</style>

<Form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<input type="text" name="EmailAddress" placeholder="Email" value="<?php echo $EmailAddress; ?>"><br>
<span class="error"><?php echo $EmailAddressErr; ?></span><br>

<input type="password" name="Password" placeholder="Password" value="<?php echo $Password; ?>"><br>
<span class="error"><?php echo $PasswordErr; ?></span><br>

<input type="submit" value="Login">

</Form>