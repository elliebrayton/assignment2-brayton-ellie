<?php 
//Adds quotes to database
include('templates/header.php');

echo "<h2>Add a Quotation</h2>";
//Restrict access to only admins: 

if(!is_administrator()){
    echo "<h2>Access Denied!</h2>";
    echo "<p class='error'>You do not have permission to access this page</p>";
    //Footer Template
    include('templates/footer.php');

    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!empty($_POST['quote']) && !empty($_POST['source'])){

        //Prepare the values for storing

        $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
        $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

        //Create the favorite value 

        if(isset($_POST['favorite'])){
            $favorite = 1;
        }else{
            $favorite = 0;
        }

        $query = "INSERT INTO quotes(quote,source,favorite) VALUES ('$quotes', '$source', '$favorite')";

        if(mysqli_affected_rows($dbc) == 1){
            echo "<p>Your quotation has been stored</p>";
        } else{
            echo mysqli_error($dbc);
            echo "<p>The query being run was:" . $query . "</p>";
        }

        //Close the connection

        mysqli_close($dbc);

    }else{ //Failed to enter a quotation
        echo "<p class='error'>Please enter a quotation and a source!</p>";
    }
} //End of if statement 

?>

<form action="add_quote.php" method="post">
    <p><label>Quote <textarea name="quote" cols="30" rows="5"></textarea></label></p>
    <p><label>Quote <input type="text" name="source"></label></p>
    <p><label>Is this a favorite?<input type="checkbox" name="favorite" value="yes"></label></p>
    <p><input type="submit" name="submit" value="Add this Quote!"></p>
</form>

<?php include ('templates/footer.php'); ?>