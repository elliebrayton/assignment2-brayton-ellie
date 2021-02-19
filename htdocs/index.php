<?php
    /*This is the home page for the website. It display:
            The most recent quote (by default)
            Or a random quote
            Or a random favorite quote
    */

    //Include the header
    include('templates/header.php');
    
    //Define the query
    If(isset($_GET['random'])){
        $query = "SELECT id, quote, source, favorite FROM quotes ORDER BY RAND() DESC LIMIT 1";
    }elseif(isset($_GET['favorite'])){
        $query = "SELECT id, quote, source, favorite FROM quotes WHERE favorite = 1 ORDER BY RAND() DESC LIMIT 1";
    }else{
        $query = "SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC LIMIT 1";
    }

    //Run the query 
    if($result = mysqli_query($dbc, $query)){

        //Retrieve the returned record 
        $row = mysqli_fetch_array($result);

        //Display the Record (quote)
        echo "<div><blockquote>{$row['quote']}</blockquote>- {$row['source']}";

        //Is it a favorite
        if($row['favorite'] == 1){
            echo "<strong>Favorite!</strong>";
        }

        //Close Div
        echo "</div>";

        //If Admin is logged in, show admin links for the quote
        If(is_administrator()){
            echo "<p>Quote Admin: <a href=\"edit_quote.php?id={$row['id']}\">Edit</a> | <a href=\"delete_quote.php?id={$row['id']}\">Delete</a></p> \n";
        }
    }else{
        echo "<p class='error'>Could not update because:" . mysqli_error($dbc) . "</p>";
        echo "<p>The query being run was:" . $query . "</p>";
    }

    mysqli_close($dbc); //Close the Connection 

    echo '<p><a href="index.php">Latest</a> | <a href="index.php?random=true">Random</a> | <a href="index.php?favorite=true">Favorite</p>';

    include('templates/footer.php');
?>
