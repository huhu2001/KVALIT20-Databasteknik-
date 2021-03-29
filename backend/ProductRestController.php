<?php
require_once("ProductRest.php");

$view = "";
if(isset($_GET["view"]))
    $view = $_GET["view"];


switch($view){

    case "all":
        $productRest = new ProductRest();
        $productRest->getAllProducts();
        break;

    case "" :
        //404 - not found;
        break;
}
?>