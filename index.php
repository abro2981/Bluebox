<?php
include("bluebox.php");

//return list of genres
function genreOptions(){
    $genre = filterByGenre();
    foreach($genre as $gen){
        echo "<option value='".$gen['genreId']."'>".$gen['genreName']. "<option>";
    }
}

//display bootstrap cardview
function displayCards($title, $movieType, $movieId){
    //echo"<div class='row'> ";
    //echo    "<div class='col-sm-6'>";
    echo       "<div class='card' style='width: 20rem;'>";
    echo            "<div class='card-block'>";
    echo                "<h3 class='card-title'>$title</h3>";
    echo               "<p class='card-text'>$movieType</p>";
    echo               "<a href='movieInfo.php?movieId=".$movieId."' class='btn btn-primary'>More Info</a>";
    echo            "</div>";
    echo        "</div>";
    //echo    "</div>";
    //echo "</div>";
    
}

?>
<html>
    <head>
        <title>BlueBox</title>
        <style>
            @import url("css/styles.css");
            
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    </head>
    <h1>BlueBox Movies</h1>
    <body>
        <form>
            <!-- "searchMovieName is the name of the textBox that a user will
            use to submit to be sql queried -->
            <input type="text" name="searchMovieName">
            <select name="searchByGenre">
                <option>Filter A Genre</option>
                <?=genreOptions()?>
            </select>
            
            <input type="radio" name="sort" value="price"/>Filter by price
            <input type="radio" name="sort" value="asc" />Ascending Order
            <input type="radio" name="sort" value="desc"/>Descending Order
            
            <input type="submit" name="Submit"/>
        </form>
        
        <?php
        if(isset($_GET['Submit'])){
            $data = returnData($_GET['searchMovieName'], $_GET['searchByGenre'], $_GET['sort']);  
            //print_r($data);
            //echo "<br/>";
            //print_r($_GET);
            echo "<div class='card-deck'>";
            foreach($data as $foo){
                displayCards($foo['movieName'], $foo['mediaType'], $foo['movieId']);
            }
            echo "</div>";
        }
        else{
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
        
    </body>
</html>