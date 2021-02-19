<?php 
//This page lets people log into the site

//Set two variables with default values 
$loggedin = false;
$error = false;

//Check to see if the form has been submitted 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Handle the Form
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        if((strtolower($_POST['email']) == 'elliebrayton@icloud.com') && ($_POST['password'] == 'corgisareawesome!')){
            //If the above is correct

            //Create a Cookie
            setcookie('Ellie', 'Brayton', time()+3600);
            //Indicate that they are logged in
            $loggedin = true;
        } else{
            $error = "<p>The submitted email address and password do not match those on file!</p>";
        }
    } else{
       $error = "<p>Please make sure you enter both a email address and a password</p>";
    }
}

//Include the header template
include('templates/header.php');

//Echo error is it exists
if($error){
    echo "<p class='error'>$error</p>";
}

//Indicate if the user is logged in or show the form 
if($loggedin){
    echo "<p>You have sucessfully logged in!</p>";
} else{
    echo '<h2>Login Form</h2>
        <form action="login.php" method="POST">
        <p><label>Email Address <input type="email" name="email"></label></p>
        <p><label>Password <input type="password" name="password"></label></p>
        <p><input type="submit" value="Login"></p>
        </form>';
}

include('templates/footer.php');
?>