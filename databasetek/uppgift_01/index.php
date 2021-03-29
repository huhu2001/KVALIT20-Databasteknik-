<?php

/***************************************
 * 
 *                CREATE
 *          Skapa en ny kontakt
 * 
 ***************************************/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("database.php");



    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
	

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
         echo "E-mail is not valid";
    }

    $name = filter_var($name, FILTER_SANITIZE_STRING );
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // Skapa en SQL-sats (förbereda en sats)
    $stmt = $conn->prepare("INSERT INTO contactform (name, email, message)
                                VALUES (:name , :email, :message)");

    // Binda parametrar (binda variabler med platshållare)
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
     $stmt->bindParam(':message', $message);

    // Kör SQL-sats
    $stmt->execute();

    $last_id = $conn->lastInsertId();

    $message = "<div class='alert alert-success' role='alert'>
                    <p>$name har sparats i databasen med id=$last_id</p>
                </div>";  
    
}

?>

<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Kontakt</title>
</head>

<body class="container">

    <h1>Contact Form</h1>

    <form action="" method="post" class="row">
        <div class="col-md-6 form-group">
            <input name="name" type="text" required
            class="form-control" placeholder="Namn">
        </div>
        <div class="col-md-6 form-group">
            <input name="email" type="email" required
            class="form-control" placeholder="E-post">
        </div>
        <div class="col-md-12 form-group">
            <textarea name="message" cols="30" rows="5" required
            class="form-control" placeholder="Skriv ett meddelande"></textarea>
        </div>
        <div class="col-md-4 form-group">
            <input type="submit" value="Skicka meddelandet"
            class="btn btn-success form-control">
        </div>
    

    </form>

</body>


<?php

if(isset($message)) echo $message;

// echo isset($message) ? $message : "";
