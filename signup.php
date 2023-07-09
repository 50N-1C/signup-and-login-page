<?php

// Start Session
session_start();

 if($_SERVER["REQUEST_METHOD"]==="POST"){

    
    include_once("connection.php");      // connection with database

    $username=mysqli_real_escape_string($dbconnection,htmlspecialchars($_POST["username"]));
    $email=mysqli_real_escape_string($dbconnection,$_POST["email"]);
    $password=mysqli_real_escape_string($dbconnection,$_POST["password"]);
 

    //Adding Data To DataBase and Check if exist or not
    
    $query="SELECT `username` FROM `data` WHERE `username` = ' . $username . ' ";
    $result= mysqli_query($dbconnection, $query);
    


    //check username exist or not
    
    if(mysqli_num_rows($result) > 0){

        $userExist ="<br> <h3 style = 'color: red;'>UserName already Exist.</h3> ";  //message for user if user exist
    
    }elseif( empty($username) ){
    
        $putUsername = "<br><h3 style='color: red;'>enter ur username please</h3>";
    
    }elseif(filter_var($username , FILTER_VALIDATE_INT) == true) {

        $invalid = " <h3 style='color: red;'>The UserName Cannot be A Number . <h3>"; // messsage for user if username input is number

    }else{
    
        //check email exist or not
    
        $query="SELECT `email` FROM `data` WHERE `email` = ' . $email . ' ";
        $result=mysqli_query($dbconnection,$query);

        if(mysqli_num_rows($result) > 0){
            
           $emailExist = "<h3 style='text-align: center ;color: red;' ; >Email already exist</h3>" ;   //message for user if email exist

        }elseif(empty($email)){
            
            //message for user if do not enter email
            $putEmail = "<br><h3 style='color: red;'>enter ur email please</h3>";

        }else{

            if(empty($password)){
                
                // message for user if do not creat password
                $putPassword = "<h3 style = 'color: red;'>please creat new password . </h3> "; 

            }else{

                //Finally Add Data To DataBase
                            
                $query="INSERT INTO `data`(`username`, `email`, `password`) VALUES (' . $username . ',' . $email . ',' . $password . ')";
                $result=mysqli_query($dbconnection,$query);

                if($result){
                    
                    die("<h2 style='text-align: center; color: green;'>SignUp successfully</h2>");  //message for user to success operation

                    mysql_close($dbconnection);
                }

            }

            }
        }
    }

 

?>


<!DOCTYPE html>
<html>
    <head>
        <title>SignUp Page</title>
    </head>
    <body>
        <h1 style="text-align: center;">SignUp Page</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" style="text-align: center;">
            <label>Enter your UserName : </label>
            <input type="text" name="username" placeholder="Username">
            <br>
            <?php echo @$userExist ; ?>
            <?php echo @$putUsername ; ?>
            <?php echo @$invalid ; ?>
            <br>
            <br>
            <label>Enter your Email : </label>
            <input type="email" name="email" placeholder="example@gmail.com">
            <br>
            <?php echo @$emailExist ; ?>
            <?php echo @$putEmail ; ?>
            <br>
            <br>
            <label>Creat New Password : </label>
            <input type="password" name="password" placeholder="new password">
            <br>
            <?php echo @$putPassword ; ?>
            <br>
            <br>
            <input type="submit" name="SignUP"> 
            <br>
            <br>
            
        </form>
    </body>
</html>

<?php 
mysqli_close($dbconnection);
?>
