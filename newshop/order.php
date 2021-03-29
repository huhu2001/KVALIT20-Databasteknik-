<?php

/***************************************
 * 
 *                CREATE
 *          Skapa en ny kontakt
 * 
 ***************************************/
require_once ("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productid = htmlspecialchars ($_POST['id']);
    $username =  htmlspecialchars ($_POST['name']);
    $phone =  htmlspecialchars ($_POST['phone']);
    $email =  htmlspecialchars ($_POST['email']);
    $address =  htmlspecialchars ($_POST['address']);
	

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
         echo "E-mail is not valid";
    }

    $name = filter_var($username, FILTER_SANITIZE_STRING );
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Skapa en SQL-sats (förbereda en sats)
    $stmt = $conn->prepare("INSERT INTO productorder (productid, username, phone, email, address)
                                VALUES (:productid, :username ,:phone, :email, :address)");

    $stmt->bindParam(':productid', $productid);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
     $stmt->bindParam(':address', $address);

    // Kör SQL-sats
    $stmt->execute();

    $last_id = $conn->lastInsertId();
}

?>

<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Order Confirmation</title>
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
    <h5 class="m-2 text-center">
        Order Confirmation</h5>
     <?php
        echo "<h5>Order ID:  " .$last_id."</h5>";
        echo "<h5>Name:  " .$username."</h5>";
        echo "<h5>Phone:  " .$phone."</h5>";
        echo "<h5>Email:  " .$email."</h5>";
        echo "<h5>Address:  " .$address."</h5>";
     ?>
    <p>




     </div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Our Website 2021</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


