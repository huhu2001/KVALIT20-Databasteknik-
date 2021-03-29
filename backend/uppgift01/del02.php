<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>  
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr  = "";
$name = $email  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-']+$/",$name)) {
      $nameErr = "No spaces,Only letters allowed";
    }  
  }
  
  $email = "";
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);

    // check if e-mail address is well-formed
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //$emailErr = "invalid email format!";
    //}

    if (!preg_match("/[a-zA-ZåäöÅÄÖ]+\.[a-zA-ZåäöÅÄÖ]+@yh.nackademin.se$/", $email)) {
        $emailErr = "Email format: fornamn.eftername@yh.nackademin.se";
    }

  }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Namn: <input type="text" name="name">
<span class="error">* <?php echo $nameErr;?></span>
  <br><br>
E-postadress: <input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
  <br><br>
<input type="submit" name="submit" value="skicka"><br>
</form>


<?php
echo "<h2>E-postadress:</h2>";
echo str_replace(array('ä','å','ö'), array('a','a','o'), strtolower($_POST['email']));

?>

</body>
</html>