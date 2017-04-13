<?php
session_start();
include("bluebox.php");



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

//header("Location: index.php");



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
    </body>
</html>

