<?php
session_start();
include("bluebox.php");



if(isset ($_GET['empty'])){
    
    session_destroy();
    header("Location: index.php");
}






?>




<!DOCTYPE html>
<html>
    <head>
        <title> Shopping Cart </title>
        <style>
            
            @import url("css/styles.css");
            
        </style>
    </head>
        <h1>Your Shopping Cart</h1>
        <nav><a href = "index.php">Home Page</a><br/></nav>
    <body>
        
        <br/>
        <br/>
        <form>
            <input type = 'submit' name = 'empty' value = 'Empty Cart'>
            
        </form>
        <br/>
        <br/>
        
        <?php
        
            $total;
            
            echo "<table>";
            echo "<tr> <th>Movie Title</th> <th>Price</th>";
            echo "</tr>";
            
            for($i = 0; $i < sizeof($_SESSION["shoppingCart"]); $i++){
                
                $cartMovie = displayCart($_SESSION["shoppingCart"][$i]);
                
                echo "<tr><td>".$cartMovie['movieName']."</td><td>".$cartMovie['priceValue']."</td></tr>";
                
                $total += $cartMovie['priceValue'];
                
                
            }
            
            echo "</table>";
            echo "<br/>";
            echo "<br/>";
           
           if(!fmod($total,1) == 0){
           echo "<div id = 'total'>"; 
            echo "Total Price: $".$total."0";
            echo "</div>";
           }
           
           else{
               
            echo "<div id = 'total'>"; 
            echo "Total Price: $".$total.".00";
            echo "</div>";
               
           }

            
        ?>

    </body>
</html>
