<?php
session_start();


//include '../../../../inc/dbConnection.php';
//include '../inc/dbConnection.php';
include ("bluebox.php");

//$dbConn = getDBConnection("bluebox");

//$np[':movie'] = $_GET['movieId'];


// function getMovieInfo(){
//     global $dbConn;
//     $np = array();
//     $sql = "SELECT * FROM movies WHERE movieId = :movieId";
    
//     $statement = $dbConn->prepare($sql);
//     $statement->execute($np);
//     $records = $statement->fetchALL(PDO::FETCH_ASSOC);
//     echo $records;
//     return $records;
// }

$title = getTitle($_GET["movieId"]);

print_r($title); //print the values in the array.

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Movie info</title>
    </head>
    <body>

        <h2> Movie Id: <?=$_GET['movieId']?></h2>
        <?php
        
            //$users = getMovieInfo();
            
            echo "Movie Info:";
            
            //foreach ($users as $user) {
                //show movie info
                //echo "check";
                //echo "<a href='movieInfo.php?movieId=".$user['movieId']."' >" . $user['movieName'] . "</a> ";
                //echo "<a href='' onclick='window.open(\"userInfo.php?userId=".$user['userId']." \", \"userWindow\", \"width=200, height=200\" )'>" . $user['lastName'] . " </a> ";
                //echo $user['email'];
               // echo "<a href='userUpdate.php?userId=".$user['userId']."'>[Update]</a> ";
               
               //echo "<a href='userUpdate.php?userId=".$user['userId']."'>
               //      <button type=\"button\" class=\"btn btn-default btn-lg\">
               //      <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span> Update
               //      </button></a>";
               
               //echo "<a onclick=confirmDelete()  href='deleteUser.php?userId=".$user['userId']."'>
               //      <button type=\"button\" class=\"btn btn-danger btn-lg\">
               //      <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span> Delete
               //      </button></a>";               
               
                // echo "<form action='deleteUser.php' onSubmit='return confirmDelete(\"".$user['firstName']."\")'>\n";
                // echo "  <input type='hidden' name='userId' value='".$user['userId']."'>\n";                
                // echo "  <input type='submit' value='Delete'>\n";
                // echo "</form>\n";
                //echo "<br />";
                
            //}
        

        ?>
    </body>
</html>