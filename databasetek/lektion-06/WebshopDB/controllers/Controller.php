<?php

// Tips
// Bra att läsa om "Dependency Injection"
// https://codeinphp.github.io/post/dependency-injection-in-php/

class Controller
{
    private $model = null;
    private $view  = null;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function main()
    {
        $this->getHeader();

        if (!isset($_GET['id'])) {
            $this->getAllproducts();
        } else {
            $this->getOrderForm();
        }

        $this->getFooter();
    }

    public function getHeader()
    {
        $this->view->viewHeader("Mywebbshop");
    }

    public function getFooter()
    {
        $this->view->viewFooter();
    }

    public function getAllProducts()
    {
        $product = $this->model->fetchAllProducts();
        $this->view->viewAllProducts($product);
    }



    

    public function getOrderForm()
    {
        $id = $this->sanitize($_GET['id']);
        $product = $this->model->fetchProductsById($id);

        if ($product) {
            $this->view->viewOneProduct($product);
            $this->view->viewOrderForm($product);
        } else {
            header("Location:index.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->processOrderForm();
        }
        
    }

    public function processOrderForm()
    {
        $product_id     = $this->sanitize($_POST['product_id']);
        $customer_id = $this->sanitize($_POST['customer_id']);
        $confirm = $this->model->saveOrder($customer_id, $product_id);

        if ($confirm) {
            $customer = $confirm['customer'];
            $lastInsertId = $confirm['lastInsertId'];
            $this->view->viewConfirmMessage($customer, $lastInsertId);
        } else {
            $this->view->viewErrorMessage($customer_id);
        }
    }


    /**
     * Sanitize Inputs
     * https://www.w3schools.com/php/php_form_validation.asp
     */
    public function sanitize($text)
    {
        $text = trim($text);
        $text = stripslashes($text);
        $text = htmlspecialchars($text);
        return $text;
    }
}

?>