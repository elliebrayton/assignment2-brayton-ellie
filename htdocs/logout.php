<?php 
    //This is the logout page. It destroys cookies

    //Destroy the Cookie 
    if(isset($_COOKIE['Ellie'])){
        setcookie('Ellie', FALSE, time()-300);
    }

    //Include the Header
    include('templates/header.php');

    //Echo a Message
    echo "<p>You are now logged out</p>";

    //Include the Footer
    include('templates/footer.php');

?>