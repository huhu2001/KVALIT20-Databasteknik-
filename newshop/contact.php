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

<body >


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">MyShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <p>
    <p>
    <div class="container" >
    <p>
    <p>
    <p>
       <br>
    <br>


    <h5 class="m-2 text-center">Contact Information</h5>
    <img src="http://localhost/newshop/images/aixia.jpg" width=100 height=120 alt="">
    <h5>Name: Aixia Zhong</h5>
    <h5>Phone: 0724711220</h5>
    <h5>Email: Aixia.Zhong@yh.nackademin.se</h5>
    <br>
    <img src="http://localhost/newshop/images/hui.jpg" width=100 height=120 alt="">
    <h5>Name: Hui Huang</h5>
    <h5>Phone: 0733970000</h5>
    <h5>Email: Hui.Huang@yh.nackademin.se</h5>
    <br>
    <h5>Contact Form</h5>

     

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
            class="btn btn-primary form-control">
        </div>
        
                      
                     
        
    </form>




 </div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


<?php

if(isset($message)) echo $message;


// echo isset($message) ? $message : "";
?>
