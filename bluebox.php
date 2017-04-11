<?php
session_start();
//get the database connection
include '../../inc/dbConnection.php';

$conn = getDBConnection("bluebox");


//filter by genre

function getGenre($genreID){
    global $conn;
    $NameParam = array();
    $NameParam[":genreId"] = $genreID;
    $sql = "SELECT * FROM genres NATURAL JOIN movies NATURAL JOIN prices WHERE genreId = :genreId ";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($NameParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
}

//filter by title 

function getTitle($title){
    global $conn;
    $NameParam = array();
    $NameParam[":title"] = '%'.$title.'%';
    $sql = "SELECT movieName, mediaType, priceValue FROM genres NATURAL JOIN movies NATURAL JOIN prices WHERE movieName LIKE :title";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($NameParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
}


//filter by price

function getPrice(){
    global $conn;
    $sql = "SELECT movieName, mediaType, priceValue FROM genres NATURAL JOIN movies NATURAL JOIN prices ORDER BY priceValue ASC";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
}

//sort by either price, title, or genre
//parameters ex. --> (price, asc)
//param arg --> movieName, genreID, or priceValue
//asc arg --> asc or desc
function sortData($param, $sort){
    global $conn;
    $NameParam = array();
    $NameParam[":param"] = $param;
    $NameParam[":sort"] = $sort;
    $sql = "SELECT movieName, mediaType, priceValue FROM genres NATURAL JOIN movies NATURAL JOIN prices ORDER BY :param :sort";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($NameParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
}


?>