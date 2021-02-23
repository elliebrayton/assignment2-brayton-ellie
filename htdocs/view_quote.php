<?php 
    //Adds quotes to database
    include('templates/header.php');

    echo "<h2>View Quotes</h2>";
    //Restrict access to only admins: 

    if(!is_administrator()){
        echo "<h2>Access Denied!</h2>";
        echo "<p class='error'>You do not have permission to access this page</p>";
        //Footer Template
        include('templates/footer.php');

        exit();
    }

//Define a query 
$query = "SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC";


//Run the query
if($result = mysqli_query($dbc, $query)){
    //Retrieve the return records:
    while($row = mysqli_fetch_array($result)){
        
        //Echo the quote
        echo "<div class='quote'><blockquote>{$row['quote']}</blockquote><span class='source'>{$row['source']}</span>\n";

        //Is this a favorite

        if($row['favorite' == 1]){
            echo "<strong>Favorite!</strong>";
        }

        //Add Admin Links 
        echo "<p>Quote Admin: <a class='btn-sm btn-primary text-decoration-none' href=\"edit_quote.php?id={$row['id']}\">Edit</a> <a class='btn-sm btn-primary text-decoration-none' href=\"delete_quote.php?id={$row['id']}\">Delete</a></p></div>";
    } //While Loop End
}else{ //Why the Query did not run

    echo "<p class='error'> Could not retrieve the data because:" . mysqli_error($dbc) . "</p>";
    echo "<p>Th query being run was:" . $query . "</p>";

} //End of query 

mysqli_close($dbc);

include('templates/footer.php');

?>