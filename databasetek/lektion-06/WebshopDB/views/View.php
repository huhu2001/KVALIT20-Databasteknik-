<?php

// Viktigt att läsa om PHP Templating och HEREDOC syntax!
// https://css-tricks.com/php-templating-in-just-php/

class View
{

    public function viewHeader($title)
    {
        $html = <<<HTML
            <!doctype html>
            <html lang="sv">
            <head>
            <meta charset="utf-8">
            <title>$title</title>
            <meta name="viewport" content="width=device-width, initial-scale=1"> 
            <link rel="stylesheet" href="styles/bootstrap.min.css">
            <link rel="stylesheet" href="styles/styles.css">
            </head>
            <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
              <div class="container">
                <a class="navbar-brand" href="index.php">$title</a>
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
                    <a class="nav-link" href="#">Order</a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" href="#">Confirm</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li>
                 </ul>
                </div>
              </div>
            </nav>
            <div class='row'>
            

        HTML;

        echo $html;
    }

    public function viewFooter()
    {
        $date = date('Y');

        $html = <<<HTML

            </div> <!-- row -->
            <footer class="text-center text-muted">
            <hr>
            <p>Copyright &copy; $date</p>
            </footer>
            </body>
            </html>
        HTML;

        echo $html;
    }

    public function viewOneProduct($product)
    {
        $html = <<<HTML

            <div class="col-lg-4 col-md-6 mb-4">
                <a href="?id=$product[product_id]">
                    <div class="card ">
                        <img class="card-img-top" src="images/$product[image]" 
                             alt="$product[title]">
                        <div class="card-body">
                            <div class="card-name text-center">
                                <h4>$product[title]</h4>
                                <h5>Pris: $product[price] kr</h5>
                                <h6>Description: $product[description]</h6>  
                                <button type="button"  formaction="order.php" data-success-text="Produkten har lagts<br />till order.!">Köp</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>  
            

        HTML;

        echo $html;
    }


    public function viewAllproducts($products)
    {
        foreach ($products as $key => $product) {
            $this->viewOneproduct($product);
            
        }
    }





    public function viewOrderForm($product)
    {

        $html = <<<HTML

            <div class="col-md-6">
                <h1 class='text-center text-primary'>Beställningsformulär</h3>
                <br>
                <h2>1.Kontrollera din beställning</h4>
                
                
                <h2>2.Kundinformation</h2>

                <form action="#" method="post" class="row">
                    <input type="hidden" name="product_id" 
                            value="$product[product_id]">
                            
                            
                    <div class="col-md-6 my-2" >
                    <label for="name">Namn:</label>
                    <input id="name" type="text" class="form-control" name="name" required 
                            placeholder="Namn">
                    </div>

                    <div class="col-md-6 my-2">
                    <label for="tel">Telefonnummer:</label>        
                    <input id="tel" type="text" class="form-control"   name="telefonnummer" required 
                            placeholder="Telefon">        
                    </div>
                    
                    <div class="col-md-6 my-2">
                    <label for="">E-post:</label>        
                    <input id="email" type="emali" class="form-control"   name="email" required 
                            placeholder="E-post">        
                    </div>

                    <div class="col-md-6 my-2">
                    <label for="address">Leveransadress:</label>        
                    <input id="adress" type="text" class="form-control"   name="adress" required 
                            placeholder="Address">        
                    </div>


                    <input type="submit" class="form-control my-2 btn btn-lg btn-outline-success" 
                            value="Skicka beställningen">
                </form>
                
            <!-- col avslutas efter en alert -->

        HTML;

        echo $html;
    }

    public function viewConfirmMessage($customer, $lastInsertId)
    {

        $this->printMessage(
            "<h4>Tack $customer[name]</h4>
            <p>Vi kommer att skicka products en till följande e-post:</p>
            <p>$customer[email]</p>
            <p>Ditt ordernummer är $lastInsertId </p>
            ",
            "success"
        );
    }
          
         
        
    public function viewErrorMessage($customer_id)
    {
        $this->printMessage(
            "<h4>Kundnummer $customer_id finns ej i vårt kundregister!</h4>
                <h5>Kontakta kundtjänst</h5>
                ",
            "warning"
        );
    }

    /**
     * En funktion som skriver ut ett felmeddelande
     * $messageType enligt Bootstrap Alerts
     * https://getbootstrap.com/docs/5.0/components/alerts/
     */
    public function printMessage($message, $messageType = "danger")
    {
        $html = <<< HTML

            <div class="my-2 alert alert-$messageType">
                $message
            </div>
            </div> <!-- col  avslutar Beställningsformulär -->

        HTML;

        echo $html;
    }
}
?>
