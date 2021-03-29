
<?php
Class Product {

    private $products = array(
    array(
       "name" => "Matcha red bean cake roll",
       "description" =>"The fluffiest matcha swiss cake roll paired with a semi-sweet azuki bean cream. Heavenly Japanese style green tea dessert just like the ones at the shops.",
        "price" => 198,
        "image" => "http://localhost/images/bullar.jpg"
    ),
    array(
       "name" => "Vanilla cake roll",
       "description" =>"A deliciously soft, moist, and light vanilla cake roll",
        "price" => 198,
        "image" => "http://localhost/images/vanillaroll.jpg"
    ),
    array(
       "name" => "Taro cake roll",
       "description" =>"The smooth taro mash is added with the delicate cake body, and there is only one feeling in the mouth, soft and delicious.",
        "price" => 208,
        "image" => "http://localhost/images/Taroroll.jpg"
    ),
    array(
       "name" => "Tiramisu",
       "description" =>"This tiramisu is made in Japanese style. The whole cake has only 60ml of cream and 30g of sugar. It can be said to be very low calorie, but the taste is very rich and layered. At the same time, you can eat chocolate, coffee, wine and cheese. , Truly delicious desserts are never satisfied with sugar and fat.",
        "price" => 399,
        "image" => "http://localhost/images/Tiramisu.jpg"
    ),
    array(
        "name" => "hokkaido cake",
        "description" =>"A classic that can never be surpassed. To make this cake requires many different processes such as baking and freezing, so its layer and taste are also very rich. The outermost decoration is actually a strawberry cake. It is troublesome to make, but the taste is absolutely pleasant.",
         "price" => 599,
         "image" => "http://localhost/images/hokkaido.jpg"
     ),
    array(
        "name" => "Sweet taro milk cake",
        "description" =>"This taro cake is mixed with the cream of the mashed taro, exuding a natural fragrance and a mellow taste, which is really hard to stop.",
         "price" => 599,
         "image" => "http://localhost/images/Tarakaka.jpg"
     ),
     array(
        "name" => "Mango cake",
        "description" =>"
        Mango-flavored cheesecake, with multiple layers and different tastes, the fresh fruity aroma is particularly delicious.",
         "price" => 599,
         "image" => "http://localhost/images/mangocake.jpg"
     ),
    array(
        "name" => "Strawberry cake",
        "description" =>"Strawberry and cream are closely integrated and penetrate each other. Each bite is full of strawberry fragrance. With cake slices that melt in your mouth, you will never tire of eating.",
        "price"=> 566,
        "image" => "http://localhost/images/fruitcake.jpg"
    ),
    array(
        "name" => "Fruit cake ",
        "description" =>"Full of fruity taste, fragrant and sweet, the cream is smooth and refreshing, not sweet or greasy.",
        "price"=> 399,
        "image" => "http://localhost/images/birthdaycake.jpg"
    ),
    array(
        "name" => "Moon cake ",
        "description" =>"
        Liuxin Mooncake series has two flavors, Liuxin Matcha and Liuxin Custard are super recommended. This series is different from ordinary Liuxin mooncakes. This is a snowy mooncake that can be eaten directly in cold storage and it doesn't need to be heated. The inner and outer layers are rich in taste and super good eat!",
        "price"=> 480,
        "image" => "http://localhost/images/mooncake.jpg"
    )
    );


    public function getAllProducts(){
        return $this->products;
    }


}
?>