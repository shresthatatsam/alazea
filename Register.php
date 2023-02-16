<! Doctype html>  
<html lang="en">  
<head>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <title> hi</title>  
  
</head>  
<body>    
<?php 
$nameErr = "";  
$emailErr = "";  
$genderErr = "";  
$websiteErr = "";  
$name = "";  
$email = "";  
$gender = "";  
$comment = "";  
$website = "";  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  if (empty($_POST["name"])) {  
    $nameErr = "Name Field is required";  
  } else {  
    $name = test_input($_POST["name"]);  
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {  
      $nameErr = "Only letters and white space allowed";  
    }  
  }  
    if (empty($_POST["email"])) {  
    $emailErr = "Email field is required";  
  } else {  
    $email = test_input($_POST["email"]);  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
      $emailErr = "Invalid email format";  
    }  
  }  
  if (empty($_POST["website"])) {  
    $website = "";  
  } else {  
    $website = test_input($_POST["website"]);  
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {  
      $websiteErr = "Invalid URL";  
    }  
  }  
  if (empty($_POST["comment"])) {  
    $comment = "";  
  } else {  
    $comment = test_input($_POST["comment"]);  
  }  
  if (empty($_POST["gender"])) {  
    $genderErr = "Gender is required";  
  } else {  
    $gender = test_input($_POST["gender"]);  
  }  
}  
function test_input($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  
<h1> PHP Registration Form Example </h1>  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">    
  <b> Enter Name: </b> <input type="text" name="name" value="<?php echo $name;?>">  
  <span class="error"> *  <?php echo $nameErr;?> </span>  
  <br> <br>  
 <b> Enter E-mail: </b> <input type="text" name="email" value="<?php echo $email;?>">  
  <span class="error"> * <?php echo $emailErr;?> </span>  
  <br> <br>  
 <b> Enter Number: </b> <input type="text" name="website" value="<?php echo $website;?>">  
  <span class="error"> * <?php echo $websiteErr;?> </span>  
  <br> <br>  
  <b> Message: </b> <textarea name="comment" rows="5" cols="40"> <?php echo $comment;?> </textarea>  
  <br> <br>  

  <input type="submit" name="submit" value="Register ">    
</form>  

</body>  
</html>  