<?php
session_start();
include("bluebox.php");



//if(isset($_GET['movieId'])){
//    $idOfMovie = $_GET['movieId'];
    
//    $_SESSION["shoppingCart"][]=$idOfMovie;
    
//    $nameOfMovie = getCartInfo($idOfMovie);
    
    
//    echo "<h1 style = 'text-align:center; color:black'><strong style='color:black;text-decoration:underline;'>
//    $nameOfMovie</strong> Was successfully Added to Your Cart!</h1>";
//    echo "<footer><a href = 'cart.php'>View Cart</a><br/>
//    <a href = 'index.php'>Return to homepage</a></footer>";
    
//    //echo "<a href = 'index.php'>Return to homepage</a>";
//}

//header("Location: index.php");



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
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
        <?php
           //same code as above
           if(isset($_GET['movieId'])){
    $idOfMovie = $_GET['movieId'];
    
    $_SESSION["shoppingCart"][]=$idOfMovie;
    
    $nameOfMovie = getCartInfo($idOfMovie);
    
    
    echo "<h1 style = 'text-align:center; color:black'><strong style='color:black;text-decoration:underline;'>
    $nameOfMovie</strong> Was successfully Added to Your Cart!</h1>";
    echo "<footer><a href = 'cart.php'>View Cart</a><br/>
    <a href = 'index.php'>Return to homepage</a></footer>";
    
    //echo "<a href = 'index.php'>Return to homepage</a>";
}
        
        ?>
    </body>
</html>

