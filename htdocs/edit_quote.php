<?php 
    //Adds quotes to database
    include('templates/header.php');

    echo "<h2>Edit Quotes</h2>";
    //Restrict access to only admins: 

    if(!is_administrator()){
        echo "<h2>Access Denied!</h2>";
        echo "<p class='error'>You do not have permission to access this page</p>";
        //Footer Template
        include('templates/footer.php');

        exit();
    }

if(isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)){
    
//Define the query
$query = "SELECT quote, source, favorite FROM quotes WHERE id={$_GET['id']}";

if($result = mysqli_query($dbc, $query)){ //Run the query
    $row = mysqli_fetch_array($result); //Retrieve the information


    //Make the form 
    echo '<form action="edit_quote.php" method=POST">
         <p><label><textarea name="quote" row="5" cols="30">' . htmlentities($row['quote']) . '</textarea></label></p></form>
         <p><label>Source <input type="text" name="source" value="' . htmlentities($row['source']) . '"></label></p>
         <p><label>Is this a favorite? <input type="checkbox" name="favorite" value="yes"';


    //Check the box if it is a favorite 
    if($row=['favorite'] == 1 ){
        echo 'checked = "checked"';
    } 

    //Complete the Form 

    echo '></label></p>
         <input type="hidden" name="id" value="' . $_GET['id'] . '">
         <p><input type="submit" name="submit" value="Update this Quote"></p>
         </form>';

}else{
    echo "<p>Could not retrieve the quotation because:" . mysqli_error($dbc) . "</p>";
    echo "<p>The query being run was:" . $query . "</p>";
}

}elseif(isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] >0)){ //Handle the Form 
    $problem = FALSE;

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
    }else{
        echo "<p class='error'>Please submit both a quotation and a source</p>";
        $problem = TRUE;
    }

    if(!$problem){
        //Define the query
        $query = "UPDATE quotes SET quote = '$quote', source='$source', favorite = $favorite WHERE id={$_POST['id']}";

        if($result = mysqli_query($dbc, $query)){
            echo "<p>Sucess! The quote has been updated!</p>";
        }else{
            echo "<p class='error'>Could not update because:" . mysqli_error($dbc) . "</p>";
            echo "<p>The query being run was:" . $query . "</p>";
        }
    }
} else{
    echo "<p class='error'>This page has been accessed in error!</p>";
} //End of main if statement

mysqli_close($dbc);

include('templates/footer.php'); //Include the footer

?>
