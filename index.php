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
    echo               "<a href='addToCart.php?movieId=$movieId' class='btn btn-primary'>Add To Cart</a>";
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
    <body>
        <div class="jumbotron">
            <h1>BlueBox Movies</h1>
            <nav><a href = "index.php" id = "currentPage">Home Page</a><br/><a href = "cart.php">Shopping Cart</a></nav>
        </div>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <form class="form-inline waves-effect waves-light">
                    <!-- "searchMovieName is the name of the textBox that a user will
                    use to submit to be sql queried -->
                    <h6 class="color">Search By Title</h6><input class= "form-control" type="text" name="searchMovieName">
                    <select name="searchByGenre">
                        <option>Filter A Genre</option>
                            <?=genreOptions()?>
                    </select>
            
                    <input type="radio" name="sort" value="price"/><h6 class="color">Filter by price</h6>
                    <input type="radio" name="sort" value="asc" /><h6 class="color">Asc Order</h6>
                    <input type="radio" name="sort" value="desc"/><h6 class="color">Desc Order</h6>
            
                    <input type="submit" name="Submit"/>

                </form>
            </div>
        </nav>

          
        <?php
        if(isset($_GET['Submit'])){
            $data = returnData($_GET['searchMovieName'], $_GET['searchByGenre'], $_GET['sort']);  
            echo "<div class='card-group'>";
            foreach($data as $foo){
                displayCards($foo['movieName'], $foo['mediaType'], $foo['movieId']);
            }
            echo "</div>";
        }
        else{
            $data = getMovies();
            echo "<div class='card-group'>";
            foreach($data as $foo){
                displayCards($foo['movieName'], $foo['mediaType'], $foo['movieId']);
            
            }
            echo "</div>";
            
        }
        
        ?>
        
    </body>
    </div>
</html>