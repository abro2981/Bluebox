<?php
session_start();
//get the database connection
include '../../inc/dbConnection.php';
//create db connection variable //check for global in functions!
$conn = getDBConnection("bluebox");

//function returns ALL movies at first like lab 5
//then it will have a lot of condition statements liek $sql .= " AND blah"
function getMovies(){
    //selects ALL records to be shows in $sql statement that will be passed in
    $sql = "SELECT * FROM bluebox WHERE 1";
    
    //condition checking for movie name to be searched in DB
    if(isset($_GET['searcMovieName'])){
        //will not prevent sql injection
        //TODO
        $sql .= " AND movieTitle = 'searchMovieName";
    }
    
    if(isset($_GET['searchGenreName'])){
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //SQL statements
    //prepares the statement we concocted above
    $statement= $dbConn->prepare($sql);
    //executes statement with knoledge of named parameters
    $statement->execute($namedParameters);
    //saves results to $records and fetches all the records
    $records = $statement->fetchALL(PDO::FETCH_ASSOC);
    
    //return/display the made sql statement
    return $records;
}


<<<<<<< HEAD
=======
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
>>>>>>> a7bd5b5bf58f48e6028f2ea86ad6cda8ec5bef6b


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


?>

<<<<<<< HEAD
<!DOCTYPE html>
=======
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

>>>>>>> a7bd5b5bf58f48e6028f2ea86ad6cda8ec5bef6b
