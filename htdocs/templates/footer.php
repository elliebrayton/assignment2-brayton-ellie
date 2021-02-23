</div>
<?php
if((is_administrator()) || (isset($loggedin) && $loggedin)){
    //Create the Links
    echo '<hr><h3 class="text-center">Site Admin</h3>
        <ul>
            <li><a href="add_quote.php">Add Quote</a></li>
            <li><a href="view_quote.php">View All Quotes</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>';
} else{
    echo "<a href='login.php'>Admin Login</a>";
    $number = 20;
$name = "Efren";

if (($number == 20) || ($name == "Billy")){
  echo "You pass the test";
}else {
  echo "You do not pass the test";
}
}

?>
            
        </div>
        <footer class='text-center' id="footer">Content &copy; <?php echo date('Y'); ?> </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </body>
</html>
