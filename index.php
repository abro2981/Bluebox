<?php
include("bluebox.php");

//return list of genres
function genreOptions(){
    $genre = filterByGenre(); //return genre
    foreach($genre as $gen){
        echo "<option value='".$gen['genreId']."'>".$gen['genreName']. "<option>";
    }
}

?>
<html>
    <head>
        <title>BlueBox</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <h1>BlueBox Movies</h1>
    <body>
        <form>
            <!-- "searchMovieName is the name of the textBox that a user will
            use to submit to be sql queried -->
            <input type="text" name="searchMovieName">
            <select name="searchByGenre">
                <option value="null">Filter A Genre</option>
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
            print_r($data);
            echo "<br/>";
            print_r($_GET);
        }
        else{
            $data = getMovies();
            print_r($data);
            echo "<br/>";
            echo count($data);
        }
        
        ?>
    </body>
</html>