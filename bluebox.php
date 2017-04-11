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







?>