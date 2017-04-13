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
function displayCards($title, $movieType){
    //echo"<div class='row'> ";
    //echo    "<div class='col-sm-6'>";
    global $data;
    echo       "<div class='card' style='width: 20rem;'>";
    echo            "<div class='card-block'>";
    echo                "<h3 class='card-title'>$title</h3>";
    echo               "<p class='card-text'>$movieType</p>";
    // movieInfo.php?movieId=".$user['movieId']."
    echo               "<a href='movieInfo.php?movieId='".$data['movieId'] ."' class='btn btn-primary'>Go somewhere</a>";
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
    <nav><a href = "index.php" id = "currentPage">Home Page</a><br/><a href = "cart.php">Shopping Cart</a></nav>
    <body>
        <div>
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
            <br/>
            <input type="submit" name="Submit"/>
        </form>
        <!--Titles-->
        <h1>All Movie Titles</h1>
        </div>
        <?php
        
        if(isset($_GET['Submit'])){
            $data = returnData($_GET['searchMovieName'], $_GET['searchByGenre'], $_GET['sort']);  
            //print_r($data);
            //echo "<br/>";
            //print_r($_GET);
            echo "<div class='card-deck'>";
            //displaying all movies as cards similar to previous lab
            foreach($data as $foo){
                displayCards($foo['movieName'], $foo['mediaType']);
            }
            echo "</div>";
        }
        else{
            $data = getMovies();
            //print_r($data);
            //echo "<br/>";
            //echo count($data);
            echo "<div class='card-deck'>";
            echo "<table>";
            $i = 0;
            foreach($data as $foo){
                displayCards($foo['movieName'], $foo['mediaType']);
                $i++;
            }
            echo "</div>";
            echo "</table>";
        }
        
        ?>
        
    </body>
</html>