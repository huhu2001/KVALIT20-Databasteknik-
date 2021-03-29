<?php

// 1. Skapa en HTTP-header med innehållstypen JSON (Content-Type).
header("Content-Type: application/json; charset=UTF-8");

// 2. Skapa två PHP-arrayer för att lagra förnamn och efternamn.
$femaleFN = ["Åsa",  "Sara",  "Anna"];
$maleFN = ["Mahmud", "Kalle", "Adam"];
$lastNames = ["Öberg", "Al Hakim", "Andersson", "Johansson", "Nilsdotter", "Ericsson"];


// 3. Skapa 10 olika namn (förnamn och efternamn)
//    och spara dessa i en ny array som heter names.

$names = array();
$firstNames ="";
$gender ="";
$email ="";
$lastName ="";
for ($i=0; $i < 10 ; $i++) { 
    $random = rand(0,1);
    $age = rand(1,100);
    

    if($random==0){
         $firstNames = $femaleFN[rand(0, count($femaleFN) - 1)];
         $gender = 'female';}
    else {$firstNames = $maleFN[rand(0, count($maleFN) - 1)];
        $gender = 'male';}
    $lastName = $lastNames[rand(0, count($lastNames) - 1)];

$email = email($firstNames,$lastName); 
    $name = array(
       "firstname" => $firstNames,        
        "lastname" => $lastName,
        "gender" => $gender,
        "age" => $age,
        "email" => $email
    );
    
    array_push($names, $name);

}
function email($fn, $ln){

    //Slårihop för/efter namn, tar bort blanka tecken och byter ut åäö
    $name=strtolower($fn).'.'.strtolower($ln);
    
    $name= preg_replace('/\s+/', '', $name);
    $name= preg_replace('/å|Å|ä|Ä/', 'a', $name);
    $name= preg_replace('/ö|Ö/', 'o', $name);
    
    //Ser till att inga nr finns med och att namnet inte är för långt/saknas
    if(preg_match('/[0-9]/',$name)){
        return 'Numbers are not allowed!';
    }elseif(strlen($name)>20){
        return 'To long name, max 20 characters';
    }elseif(strlen($name)==0){
        return 'Please write your name';
    }
    //Epostadressen returneras


return $name.'@yh.nackademin.se';
}

// 4. Konvertera PHP-arrayen till en JSON-string.
$json = json_encode($names, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

// Skicka JSON till klienten.
echo $json;
