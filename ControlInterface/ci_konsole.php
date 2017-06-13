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

        <textarea id="console_log" style="resize: none; width: 50%; height: 75%"><?php echo file_get_contents("console.txt"); ?></textarea>
        <script type="text/javascript">
            var textarea = document.getElementById('console_log');
            textarea.scrollTop = textarea.scrollHeight;
        </script>
        <br>
        <form>
            <input id="command" name="Command" style="width: 42.2%;" type="text" >
            <button onclick="absenden()" id="berechnen">Absenden</button>
        </form>
        <script type="text/javascript">
            function absenden() {
                var command = document.getElementById('command').value;
                xhttp = new XMLHttpRequest();
                xhttp.open("POST", "command.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('command=' + command);
                alert("Command send");
            }
        </script>
    </body>
</html>



