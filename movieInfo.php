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
    </head>
    <div>
    <body>
        <h1>Movie Info</h1>
        
        
        <?php
        
            //$users = getMovieInfo();
            global $title;
            //echo "Movie Info:";
            //echo "Genre";
            //print_r($title);
            
            foreach($title as $foo){
                
                echo "<div>" . "Movie Name: ";print_r($foo['movieName']);
                echo "<br/>";
                echo "Genre: ";print_r($foo['genreName']);
                echo "<br/>";
                echo "Media Type: "; print_r($foo['mediaType']);
                echo "<br/>";
                echo "Price: ";print_r($foo['priceValue']); echo "</div>";
                
            }
         
        

        ?>
        
        <br/>
        <footer>
            <a href = "index.php">Return to home</a>
        </footer>
    </body>
    </div>
</html>