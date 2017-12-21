<!DOCTYPE>
<?php
session_start();
if (!isset($_SESSION['angemeldet' . $_COOKIE['user']]) || $_SESSION['angemeldet' . $_COOKIE['user']] != true) {
    header('Location: /index');
}
?>
<html>
    <head>

    </head>
    <body>
    
        <button onclick="start() ; location.reload()">Start</button>
    
       
        <script type="text/javascript">
           function start(){
           var spiel = <?php echo json_encode(file_get_contents("spiel.txt")); ?>;
           <?php if(file_get_contents("status.txt") != "online"){
           echo "xhttp = new XMLHttpRequest();";
           echo "xhttp.open('POST', 'functions', true);";
           echo "xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');";
           echo "xhttp.send('function=' + spiel);" ;
           echo "alert(spiel + 'Server wird gestartet');";
            } else {
           echo "alert('Server läuft bereits');";
            }
           ?>
           }
    
        </script>
    </body>
</html>



