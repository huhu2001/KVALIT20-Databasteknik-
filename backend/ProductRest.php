<?php
require_once("Product.php"); //Inkludera och kör den angivna filen under skriptkörning

class ProductRest {

    public function setHttpHeaders(){
        header("Content-Type: application/json");
    }
    function getAllProducts() {

        $product = new Product();
        $rawData = $product->getAllProducts();

        $this ->setHttpHeaders();
        echo json_encode($rawData);
       
    }

}
?>