<?php
//get the database connection
include '../inc/dbConnection.php';
//create db connection variable //check for global in functions!
$conn = getDBConnection("bluebox");

function getMovies(){
    global $conn;
    $sql = "SELECT movieName, mediaType, priceValue FROM genres NATURAL JOIN movies NATURAL JOIN prices ";
    //SQL statements
    $statement= $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchALL(PDO::FETCH_ASSOC);
    
    //return/display the made sql statement
    return $records;
}

// filter by genre
function filterByGenre(){
    global $conn;
    $NameParam = array();
    $NameParam[":genreId"] = $genreID;
    $sql = "SELECT genreId, genreName FROM genres";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($NameParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
}

//filter by title
/***depreciated***/
function getTitle($title){
    global $conn, $sql, $NameParam;
    $NameParam[":title"] = '%'.$title.'%';
    $sql = "SELECT movieName, mediaType, priceValue FROM genres NATURAL JOIN movies NATURAL JOIN prices WHERE movieName LIKE :title";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($NameParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
}


//sort by price
/***depreciated***/
function getPrice(){
    global $conn;
    $sql = "SELECT movieName, mediaType, priceValue FROM genres NATURAL JOIN movies NATURAL JOIN prices ORDER BY priceValue ASC";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
}

//sort by either price, title, or genre
//param arg --> movieName, genreID, or priceValue
//asc arg --> asc or desc
/***depreciated***/
function sortData($param, $sort){
    global $conn;
    $data = null;
    $NameParam = array();
    $NameParam[":param"] = $data;
    $NameParam[":sort"] = $sort;
    $sql = "SELECT movieName, mediaType, priceValue FROM genres NATURAL JOIN movies NATURAL JOIN prices ORDER BY :param :sort";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($NameParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
   
    return $records;
}


//filter data from DB by tile, genre or price
//sort by ASC or DESC 
function returnData($title, $genre, $sortingType){
    global $conn;
    $NameParam = array();
    
    $sql = "SELECT movieName, mediaType, priceValue, genreId, genreName FROM genres NATURAL JOIN movies NATURAL JOIN prices ";
    if(!empty($title)){
        $NameParam[":title"] = '%'.$title.'%';
        $sql .= "WHERE movieName LIKE :title ";
    }
    if($genre != "Filter A Genre" && !empty($title)){
        $NameParam[":genre"] = $genre;
        $sql .= "AND genreId = :genre ";
    }
    if(empty($title) && $genre != "Filter A Genre"){
        $NameParam[":genre"] = $genre;
        $sql .= "WHERE genreId = :genre ";
    }
    if(!empty($sortingType)){
        if($sortingType == "asc"){
            $sql .= "ORDER BY movieName ASC";
        }
        else if($sortingType == "price"){
            $sql .= "ORDER BY priceValue ";
        }
        else{
            $sql .= "ORDER BY movieName DESC";
        }
    }
   

    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($NameParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
    
}

?>