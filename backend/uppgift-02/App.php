<?php

class App
{
    public static $endpoint = "https://fakestoreapi.com/products";

    public static function main()
    {
        try {
            $array = self::getData();
            
            self::viewData($array);

        } 
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getData()
    {

        $json = @file_get_contents(self::$endpoint);
        // @ = Error Control Operator

        if (!$json)
            throw new Exception("Cannot access " . self::$endpoint);

        // Returnera data som en PHP-Array
        return json_decode($json, true);
    }



    public static function viewData($array)
    {

        $array1 = array_filter($array, function($item) {return $item['category'] == 'men clothing';});
        $array2 = array_filter($array, function($item) {return $item['category'] == 'women clothing';});
        $array3 = array_filter($array, function($item) {return $item['category'] == 'jewelery';});
        $array_final = array_merge($array1, $array2, $array3);
        
       $template = "";
       foreach ($array_final as $key => $value) {
         $template .= "
         <section>
            <div class='container'>
                <div class='row align-items-center'>
                    <div class='col-lg-6 order-lg-2'>
                        <div class='p-4'>
                            <img
                            src='$value[image]' 
                            class='img-fluid rounded-circle'
                            alt=''
                            > 
                        </div>
                    </div>

                    <div class='col-lg-6 order-lg-1'>
                        <div class='p-5'>
                            <h2 class=display-8>
                                $value[title]
                            </h2>
                            <p>
                                Price: $value[price]
                            </p>
                            <p> Description: $value[description] 
                            </p>
                            <p> Category: $value[category] 
                            </p>
                        </div>
                    </div> 

                </div>    
            </div>
        </section>
        <hr>";           
      }
      echo $template;
    }
    
}
?>