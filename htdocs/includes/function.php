<?php //This file defines custom functions 

/*=======================

This function checks to see if user is administratot
This function takes two optional values
This function returns Boolean Value 

========================*/
function is_administrator($name = 'Ellie', $value = 'Brayton'){

    //Check to see if the cooki is set and to check its value 
    if(isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)){
        return true;
    } else{
        return false;
    }

} //Ends the is_admin() function

//Connect Variable 

$dbc = mysqli_connect('localhost', 'root', 'root', 'assignment-2')

?>