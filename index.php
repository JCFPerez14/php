<?php
$name = $adress = $email = "";
$nameErr = $adressErr = $emailErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["name"])){
        $nameErr = "Name is required";
    } else{
        $name = $_POST["name"];
    }

    if(empty($_POST["adress"])){
        $adressErr = "Adress is required";
    } else{
        $adress = $_POST["adress"];
    }

    if(empty($_POST["email"])){
        $emailErr = "Email is required";
    } else{
        $email = $_POST["email"];
    }
}
?>
    <style>
        .error{
            color: red;
        }
    </style>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="name" value="<?php echo $name; ?>"><br>
            <span class="error"><?php echo $nameErr; ?></span><br>
        <input type="text" name="adress" value="<?php echo $adress; ?>"><br>
            <span class="error"><?php echo $adressErr; ?></span><br>
        <input type="text" name="email" value="<?php echo $email; ?>"><br>
            <span class="error"><?php echo $emailErr; ?></span><br>
        <input type="submit" value="Submit">
    <hr>
<?php
    include("class/database.php");
    if($name && $adress && $email){
        echo $name . "<br>";
        echo $adress . "<br>";
        echo $email . "<br>";
    }
?>