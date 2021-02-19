<?php
if((is_administrator()) || (isset($loggedin) && $loggedin)){
    //Create the Links
    echo '<hr><h3>Site Admin</h3>
        <ul>
            <li><a href="add_quote.php">Add Quote</a></li>
            <li><a href="view_quote.php">View All Quotes</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>';
}

?>

        </div>
        <footer id="footer">Content &copy; <?php echo date('Y'); ?> </footer>
    </body>
</html>
