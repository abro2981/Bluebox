<?php
session_start();


//include '../../../../inc/dbConnection.php';
//include '../inc/dbConnection.php';
include ("bluebox.php");

$dbConn = getDBConnection("bluebox");

//$np[':movie'] = $_GET['movieId'];


function getMovieInfo(){
     global $dbConn;
     $np = array();
     $sql = "SELECT * FROM movies,priceId WHERE movieId = :movieId";
     $np[':movieId'] = $_GET['movieId'];
     $statement = $dbConn->prepare($sql);
     $statement->execute($np);
     $records = $statement->fetchALL(PDO::FETCH_ASSOC);
     echo $records;
     return $records;
 }
 function displayCards($title, $movieType, $movieId){
    //echo"<div class='row'> ";
    //echo    "<div class='col-sm-6'>";
    echo       "<div class='card' style='width: 20rem;'>";
    echo            "<div class='card-block'>";
    echo                "<h3 class='card-title'>$title</h3>";
    echo               "<p class='card-text'>$movieType</p>";
    echo               "<a href='movieInfo.php?movieId=".$movieId."' class='btn btn-primary'>More Info</a>";
    echo               "<a href='addToCart.php?movieId=$movieId' class='btn btn-primary'>Add To Cart</a>";
    echo            "</div>";
    echo        "</div>";
    //echo    "</div>";
    //echo "</div>";
    
}

$title = getTitle($_GET["movieId"]);
//print_r($title); //print the values in the array.

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Movie info</title>
        <style>
            @import url("css/styles.css");
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
    <div>
    <body class="wrapper">
        <h1 class="header">Movie Info</h1>
        
        <nav><a href = "index.php" id = "currentPage">Home Page</a><br/></br><a href = "cart.php">Shopping Cart</a></nav>
        <?php
        
            //$users = getMovieInfo();
            global $title;
            //echo "Movie Info:";
            //echo "Genre";
            //print_r($title);
            
            foreach($title as $foo){
              
                //display all movie information
                echo "<h1>";
                echo "<div>" . "Movie Name: ";print_r($foo['movieName']);
                echo "<br/>";
                echo "Genre: ";print_r($foo['genreName']);
                echo "<br/>";
                echo "Media Type: "; print_r($foo['mediaType']);
                echo "<br/>";
                echo "Price: ";print_r($foo['priceValue']); echo "</div>";
                echo "</h1>";
                
                //echo "<a style = 'color:black'href='addToCart.php?movieId=$movieId' class='btn btn-primary'>Add To Cart</a>";
                //display all movies anyways
               $data = getMovies();
               //print_r($data);
               //echo "<br/>";
               //echo count($data);
               echo "<div class='card-deck'>";
               foreach($data as $foo){
                  displayCards($foo['movieName'], $foo['mediaType'], $foo['movieId']);
               }
               echo "</div>";
               
            }
         
        

        ?>
        
        <br/>
        <footer>
            <a href = "index.php">Return to home</a>
        </footer>
    </body>
    </div>
</html>