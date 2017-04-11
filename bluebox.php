<?php
session_start();
//get the database connection
include '../../inc/dbConnection.php';

$conn = getDBConnection("bluebox");


//filter by genre

function getGenre($genreID){
    $sql = "SELECT * FROM genres NATURAL JOIN movies NATURAL JOIN prices WHERE genreId = 1 ";
}

//filter by title 




//filter by price


?>