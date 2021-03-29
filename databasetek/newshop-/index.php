<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MyShop Homepage </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<?php

 require_once ("database.php");

 // Förbered en SQL-sats
 $stmt = $conn->prepare("SELECT * FROM product");

 // Kör SQL-satsen
 $stmt->execute();

 // Hämta alla rader som finns i contacts
 // fetchAll()
 // Returns an array containing all of the result set rows
 $result = $stmt->fetchAll();

 $table = "";


?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">MyShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
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

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">My Shop</h1>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">

		<?php
			foreach($result as $key => $value){

				  echo "<div class=\"col-lg-4 col-md-6 mb-4\">";
				  echo "<div class=\"card h-100\">";
				  echo "<a href=\"#\"><img class=\"card-img-top\" src=\"". $value['image'] . "\" alt=''></a>";
				  echo "<div class=\"card-body\">";
				  echo "<h4 class=\"card-title\">";
				  echo "<h4 href=\"#\">".  $value['name'] ."</h4>";
				  echo "</h4>";
				  echo "<h5>". $value['price']."kr</h5>";
				  echo "<p class='card-text'>".$value['description']  ."</p>";
				  echo "</div>";
				  echo "<div class=\"card-footer\">";
				  echo "<a class=\"btn btn-primary\" href=\"buy.php?id=" .$value['id']  ."\" role=\"button\">Kop Nu</a>";
				  echo "</div>";
				  echo "</div>";
				  echo "</div>";
				  
				}
		?>
          
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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

</html>
