<?php

// Tips
// Bra att läsa om "Dependency Injection"
// https://codeinphp.github.io/post/dependency-injection-in-php/

class Model
{
    private $db = null;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function fetchAllProducts()
    {
        $product = $this->db->select("SELECT * FROM products");
        return $product;
    }
    
  
    public function fetchproductsById($id)
    {
        $statement = "SELECT * FROM products WHERE product_id=:id";
        $parameters = array(':id' => $id);
        $product = $this->db->select($statement, $parameters);

        // print_r($product);

        if ($product) {
            
            return $product[0];
        }

        return false;

    }

    

    public function fetchCustomersById($id)
    {
        $statement = "SELECT * FROM customers WHERE customer_id=:id";
        $parameters = array(':id' => $id);
        $customer = $this->db->select($statement, $parameters);

        if ($customer) {
            return $customer[0];
        }

        return false;
    }
    

    public function saveOrder($product_id, $customer_id)
    {
        $customer = $this->fetchCustomersById($customer_id);

        if ($customer) {

            $statement = "INSERT INTO orders (customer_id, product_id)  
                          VALUES (:customer_id, :product_id)";
            $parameters = array(
                ':customer_id' => $customer_id,
                ':product_id' => $product_id
            );

            $lastInsertId = $this->db->insert($statement, $parameters);

            return array('customers' => $customer, 'lastInsertId' => $lastInsertId);
        } else {
            return false;
        }
        $result = $this->fetchAllProducts();

    }
}

?>
