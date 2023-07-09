<?php
if ($_SERVER["REQUEST_METHOD"]==="POST"){

    // open connection with database
    require_once("connection.php");
    
    $email = mysqli_real_escape_string($dbconnection,htmlspecialchars($_POST["email"]));
    $password= mysqli_real_escape_string($dbconnection,htmlspecialchars($_POST["password"]));

    //check from email and password to login
    $query = "SELECT `email`, `password` FROM `data` WHERE `email` = ' {$email} ' AND `password` = ' {$password} ';" ;
    
    $result= mysqli_query($dbconnection,$query);


    if(mysqli_num_rows($result) > 0){
        die("login successfully . ");
        mysqli_close($dbconnection);
    }else{
        $error="<h4 style='color: red;'>your email or password is wrong";
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <h1 style="text-align: center;">Login page</h1>
        <form style="text-align: center;" action="" method="POST">
            <?php echo @$error;?>
            <br>
            <br>
            <input type="email" name="email" placeholder="example@gmail.com">
            <br>
            <br>
            <input type="password" name="password" placeholder="password">
            <br>
            <br>
            <input type="submit" name="Login">
        </form>
    </body>
</html>

<?php 
mysqli_close($dbconnection);
?>
