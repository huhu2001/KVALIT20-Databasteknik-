<?php

/****************************************
 * 
 *                READ
 * Läs tabellen contacts från databasen
 * Presentera resultatet i en HTML-tabell
 * 
 ***************************************/

 // Hämta $conn (en instans av PDO)
 require_once ("../database.php");

 // Förbered en SQL-sats
 $stmt = $conn->prepare("SELECT * FROM productorder");

 // Kör SQL-satsen
 $stmt->execute();

 // Hämta alla rader som finns i contacts
 // fetchAll()
 // Returns an array containing all of the result set rows
 $result = $stmt->fetchAll();

 $table = "";

 foreach($result as $key => $value){

    // echo $key; // 012345
    // echo $value; // OBS! $value är en array
    // echo "<hr><pre>";
    // print_r($value);
    // echo "</pre>";

    // echo $value['name'] . ", " . $value['tel']  . "<br>";
    // Eller
    // echo "$value[name] , $value[tel] <br>";

    $id = $value['id'];  // Detta är en primärnyckel
    $table .= "
        <tr>
            <td>$value[id]</td>
            <td>$value[productid]</td>
            <td>$value[username]</td>
             <td><pre>$value[phone]</pre></td>
             <td>$value[email]</td>
             <td>$value[address]</td>
        </tr>
    ";

 }


 /*
 echo "<hr><pre>";
 print_r($result);
 echo "</pre>";
 */
 ?>

 <html lang="sv">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Alla meddelanden</title>
</head>

<body class="container">

        <table class="table table-sm"><tr class="table-dark"><th>OrderID</th><th>ProductID</th><th>Namn</th><th>Phone</th><th>E-post</th><th>Address</th></tr>
   <?php
   echo $table
   ?>
               </table>

</body>
</html>
