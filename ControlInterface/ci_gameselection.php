<!DOCTYPE>
<?php
session_start();
if (!isset($_SESSION['angemeldet' . $_COOKIE['user']]) || $_SESSION['angemeldet' . $_COOKIE['user']] != true) {
    header('Location: /index.php');
}
?>
<html>
    <head>

    </head>
    <body>
        <?php 
        //$a = array("StarMade" , "7DaysToDie");
        //file_put_contents("games.txt", serialize($a));
        $spiele = unserialize(file_get_contents("games.txt"));
        foreach ($spiele as $spiel){
            echo'<button onclick="selectGame(\'' . $spiel . '\')">'. $spiel .'</button>';
        }
        ?>
       
    
       
        <script type="text/javascript">
           function selectGame(game){
       
           var xhttp = new XMLHttpRequest();
           xhttp.open('POST', 'selectgame.php', true);
           xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
           xhttp.send('Spiel=' + game);
           alert(game + ' Ausgewählt');
           
           }
    
        </script>
    </body>
</html>



