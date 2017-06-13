<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Herzlich Wilkommen im WebInterface hosted by Seven Industries Cooperation</title>
    </head>

    <body style="background-color: black; background-image: url(test10005.png); background-size: cover">
       
        
       
           <div style=" padding-top: 20%; padding-bottom: 10px;  margin-left: 20px; margin-right: 20px;" align="center">
             
               <form action="datenueberpruefung.php" method="POST" target="_top">
                <p>Username:<input name="username" type="text" value=""/></p>
                <p>Password:<input name="password" type="password" value=""/></p>
                <button type="submit">Anmelden</button>
            </form>
               <form action="registrieren.php" method="POST" target="content">
                <p>oder</p>
                <p><button type="submit">Registrieren</button></p>
            </form>
        </div>
        
        
       
    </body>


</html>

