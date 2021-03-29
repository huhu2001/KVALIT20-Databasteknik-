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

$category='';
$category =  !empty($_GET["category"])? $_GET["category"]:'';

$loginUrl = 'http://localhost/api/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$loginUrl);
$result=curl_exec($ch);
curl_close($ch);
$data=json_decode($result);
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
			foreach ($data as $item){
				//echo var_dump($item);
					
				  echo "<div class=\"col-lg-4 col-md-6 mb-4\">";
				  echo "<div class=\"card h-100\">";
				  echo "<a href=\"#\"><img class=\"card-img-top\" src=\"". $item->image . "\" alt=''></a>";
				  echo "<div class=\"card-body\">";
				  echo "<h4 class=\"card-title\">";
				  echo "<a href=\"#\">".  $item->name ."</a>";
				  echo "</h4>";
				  echo "<h5>". $item->price. "kr</h5>";
				  echo "<h5>Quantity in stock: ". rand(0, 50). "</h5>";
				  echo "<p class='card-text'>".$item->description  ."</p>";
				  echo "</div>";
				  echo "<div class=\"card-footer\">";
				  echo "<small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
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
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
