<?php
session_start();
include("bluebox.php");



if(isset($_GET['movieId'])){
    $idOfMovie = $_GET['movieId'];
    
    $_SESSION["shoppingCart"][]=$idOfMovie;
    
    $nameOfMovie = getCartInfo($idOfMovie);
    
    echo "<h1 style = 'text-align:center; color:rgb(90, 147, 255)'><strong style='color:black'>$nameOfMovie</strong> Successfully Added to Your Cart!</h1>";
    
}

//header("Location: index.php");



?>

