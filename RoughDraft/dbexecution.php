<!DOCTYPE HTML>  

<html>

<head>

    <link rel="stylesheet" href="ROUGHPAO.css">

</head>

<body>  
<header>
        <div class="PAOBOXLogo">
        <h1  id="PAOBOXLogo">
        <a href="PAOBOX.html">PAOBOX</a> 
        </h1>
        </div>
</header>

<nav>      
    <div class="Tabs">
        <a id="HomeButton" href="PAOBOX.html">Home</a>
        <a id="AboutMeButton" href="AboutMe.html">About Me</a>
        <a id="ProjectsButton" href="Projects.html"> Projects</a>
        <a id="ContactButton" href="Contact_FOrm.html">Contact</a>
              
    </div>
</nav>

<h2>Contact Form Confirmation</h2>
<?php

$to = "pochoa@cord.edu";
$subject = "Mail From website";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $comment;
$headers = "From: noreply@yoursite.com" . "\r\n" .
"CC: somebodyelse@example.com";

 $name = $email = $WAY = $region = $phonenumber = $comment  = $agree = "";

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "contact_form";
  
 // Create connection
 $conn = new mysqli($servername,
     $username, $password, $dbname);
  
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $WAY = $_POST["WAY"];
    $region = $_POST["region"];
    $phonenumber = $_POST["phonenumber"]; 
    $comment = $_POST["comment"];
    $agree = $_POST["agree"];

    $sql = "INSERT INTO contact_form (name,email,WAY,region,phonenumber,comment,agree) VALUES ('$name', '$email','$WAY', '$region','$phonenumber','$comment','$agree')";

   if (mysqli_query($conn, $sql)) {
        echo "<br><br> New record created successfully";
    }   else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $WAY = $_POST["WAY"];
    $region =$_POST["region"]; 
    $phonenumber = $_POST["phonenumber"];
    $comment = $_POST["comment"];
    $agree = $_POST["agree"];
  
  //cookie data
    $cookieData = array("name"=> $name,"email"=> $email,"WAY"=> $WAY,"region"=> $region, "phonenumber"=> $phonenumber, "comment"=> $comment,"agree"=> $agree);
  
    $cookie_name = "cookie_form";
    $cookie_value = "cookieData"; 
    $expireTime = time() * 0; // 30 days6
    setcookie("cookie_form", json_encode($cookieData), $expireTime, "/");
    //include 'dbexecution.php'; 
  }
  if(!isset($_COOKIE[$cookie_name])) {
    echo "<br><br>Cookie named '" . $cookie_name . "'  is not set!";
      //redirect to form
  } else {
    echo "<br<br>Cookie '" . $cookie_name . "is set!<br>";
    echo "<br />We appreciate taking the time to fill out the form, " . $name. "<br><br>Have a good day!<br>";
    } 

    if($email!=NULL){
        mail($to,$subject,$txt,$headers);
    }
?>

<footer>
    <div class="ContactUs">
        <h2 id="ContactUsLogo">Contact Us</h2>    
        <a href="mailto:pochoa@cord.edu">
        <img src="Email.png"alt="Email"width="50"height="50">
        </a>
        <a href="https://instagram.com/clubaccessccm?igshid=YmMyMTA2M2Y=">
        <img src="Instagram.png" alt="Instagram" width="50" height="50">
        </a>        
    </div>
</footer>

</body>

</html>