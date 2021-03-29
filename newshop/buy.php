<?php

 require_once ("database.php");
 $productid = $_GET['id'];
 $stmt = $conn->prepare("SELECT * FROM product where id=".$productid);
 $stmt->execute();
 $result = $stmt->fetchAll();
 $product = '';
 foreach($result as $key => $value){
    $product = $value;
 }


?>

<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Buy</title>
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
        Order Information</h5>
    <p>
     <?php
        echo "<img height=\"80\" width=\"80\"  src=\"". $product['image'] . "\" alt=''>";
        echo "<h5>" .$product['name']."</h5>";
        echo "<h5>Cost:  " .$product['price']."kr</h5>";
     ?>
    <p>

    <h4>Delivery information</h4>

    <form action="order.php" method="post" class="row">
        <?php
            echo "<input name=\"id\" type=\"hidden\" value=".$productid." >"
        ?>

        <div class="col-md-6 form-group">
            <input name="name" type="text" required
            class="form-control" placeholder="Namn">
        </div>
        <div class="col-md-6 form-group">
            <input name="phone" type="phone" required
            class="form-control" placeholder="Mobilnummber">
        </div>
        <div class="col-md-6 form-group">
            <input name="email" type="email" required
            class="form-control" placeholder="E-post">
        </div>
        <div class="col-md-12 form-group">
            <input name="address" type="address" required
            class="form-control" placeholder="Leveransaddress">
        </div>
        <div class="col-md-4 form-group">
            <input type="submit" value="Skicka"
            class="btn btn-primary form-control">
        </div>
    </form>



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

