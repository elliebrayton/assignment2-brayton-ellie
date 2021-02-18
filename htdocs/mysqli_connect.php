<?php //This script connects to the database and creats a table

    if($dbc = mysqli_connect('localhost', 'root', 'root', 'assignment-2')){
        echo "Connection was successful";

        $query = 'CREATE TABLE quotes(
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            quote TEXT NOT NULL,
            source VARCHAR(100) NOT NULL,
            favorite TINYINT(1) UNSIGNED NOT NULL,
            date_entered TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(id)
            )CHARACTER SET utf8';
    }

    if(@mysqli_query($dbc, $query)){
        echo "<p>The table has sucessfully been created</p>";
    } else{
        echo  mysqli_error($dbc);
    }

?>