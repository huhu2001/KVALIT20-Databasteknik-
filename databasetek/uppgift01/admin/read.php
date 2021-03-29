<?php

 // Hämta $conn (en instans av PDO)
 require_once ("../database.php");

 // Förbered en SQL-sats
 $stmt = $conn->prepare("SELECT * FROM contacts");

 // Kör SQL-satsen
 $stmt->execute();

 // Hämta alla rader som finns i contacts
 // fetchAll()
 // Returns an array containing all of the result set rows
 $result = $stmt->fetchAll();

 $table = "
    <table class='table table-sm'>
    <tr class='table-dark'>
        <th>Namn</th>
        <th>E-post</th>
        <th>meddelande</th>
        <th>admin</th>
    </tr>

    ";

 foreach($result as $key => $value){

    $id = $value['id'];  

    $table .= "
        <tr>
            <td>$value[name]</td>
            <td>$value[email]</td>
            <td>$value[meddelande]</td>
            <td>
                <a href='delete.php?id=$value[id]'
                 class='btn btn-sm btn-outline-danger'>
                 Ta bort
                </a>
            </td>  
        </tr>
    ";
     
 }

?>

 <html lang="sv">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Alla meddelanden</title>
</head>

<body class="container">

        <table class="table table-sm"><tr class="table-dark"></tr>


<?php
    
 $table .= "</table> 
 <a href='delete.php?id=0' 
     class='btn btn-sm btn-outline-danger'>
    Ta bort alla meddelanden 
   </a>";
 

 echo $table;




 ?>