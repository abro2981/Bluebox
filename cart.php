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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
        
    <body>
        <div class="jumbotron">
            <h1>BlueBox Movies</h1>
            <nav><a href = "index.php" id = "currentPage">Home Page</a><br/><a href = "cart.php">Shopping Cart</a></nav>
            
        </div>
        
           
        <div id = "emptyCart"> 
        <nav class="navbar navbar-dark bg-primary">
            <div class="container" id = "emptyCart">
                <form>
                    <input type = 'submit' id = "emptyCartButton" name = 'empty' value = 'Empty Cart'>
                </form>
            </div>
        </nav>
        </div>   
        
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
