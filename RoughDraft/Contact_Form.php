<!DOCTYPE HTML>  

<html>

<head>
    
<link rel="stylesheet" href="ROUGHPAO.css">

</head>

<body>  
<?php

        $nameErr = $emailErr = $WAYErr = $regionErr = $phonenumberErr = $agreeErr = "";

        $name = $email = $WAY = $region = $phonenumber = $comment =  $agree = ""; 
?>
    <script type="text/javascript">
        function ValidateForm()
        {
            var isValid = true;

            if(document.forms["contact_form"]["phonenumber"].value == "")
            {
                alert("Need to be filled out");
                returnToPreviousPage();
                isValid = false;
                document.getElementByName("label_phonenumber").className = "error";
            }
            alert("Form Filled");
            return isValid;
        }
    </script>
<?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST["name"])) {

            $nameErr = "Please enter a valid name";

        } else {

            $name = test_input($_POST["name"]);

            // check if name only contains letters and whitespace

            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {

            $nameErr = "Only letters and white space allowed";

            }

        }

        if (empty($_POST["email"])) {

            $emailErr = "valid Email address";

        } else {

            $email = test_input($_POST["email"]);

            // check if e-mail address is well-formed

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $emailErr = "The email address is incorrect";

            }

        }    

        if (empty($_POST["WAY"])) {

            $WAYErr = "Please select who you are?";

        } else {

            $WAY = test_input($_POST["WAY"]);

        }

        if (!empty($_POST['region'])) {

            $region = test_input($_POST["region"]);

        } else {

            $regionErr = "Please select one region?";

        }

        
        if(empty($_POST["phonenumber"]))    {

            $phonenumberErr = "Enter a Valid Phone Number";

        } else  {
            
            $phonenumber = test_input($_POST["phonenumber"]);

            // check if name only contains letters and whitespace
            if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phonenumber)) {

                echo $phonenumberErr = "Enter a Valid Phone Number";

            }
        }  
          

        if (empty($_POST["comment"])) {

            $comment = "";
    
        } else {
    
            $comment = test_input($_POST["comment"]);
    
        }


        if (!isset($_POST['agree'])){  

            $agreeErr = "Accept terms of services before submit.";
            
        } else {  
            
            $agree = test_input($_POST["agree"]);  
        }  
    }
  

        function test_input($data) {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

        } ?>


<header>
        <div class="PAOBOXLogo">
        <h1  id="PAOBOXLogo">
        <a href="PAOBOX.html">PAOBOX</a> 
        </h1>
        </div>
</header>

<nav>      
    <div class="Tabs">
        <a id="HomeButton" href="PAOBOX.html">About Me</a>
        <a id="ProjectsButton" href="Projects.html"> Projects</a>
        <a id="ContactButton" name="Contact Tab" href = "Contact_Form.html"> Contact</a>

    </div>
</nav>

    <h2>PHP Form Validation Example</h2>

    <p><span class="error">* required field</span></p>

    <form id = "contact_Form" name = "contact_form" method="post"  onsubmit= "return ValidateForm(); event.preventDefault();" action = "dbexecution.php">  

        <label id="label_name" name="label_name" for="name"> Full Name: </label> <input type="text" placeholder = "First Last" id = "name" name="name"<?php if (!empty($_POST['name'])) {echo "value=\"" . $_POST["name"] . "\"";} ?>>

        <span class="error">* <?php echo $nameErr;?></span>

        <br><br>

        <label id ="label_email" name= "label_email" for="email"> Email: </label> <input type="text" placeholder ="johnsmith@email.com" id = "email" name="email"<?php if (!empty($_POST['email'])) {echo "value=\"" . $_POST["email"] . "\"";} ?>>

        <span class="error">* <?php echo $emailErr;?></span>

        <br><br>

        <label id = "label_WAY" name= "label_WAY" for="WAY"> Who are you?: </label>

            <input type="radio" id = "WAY" name="WAY" value="Peer">Peer

            <input type="radio" id = "WAY" name="WAY" value="Viewer">Viewer

            <input type="radio" id = "WAY" name="WAY" value="Collaborator">Collaborator

            <span class="error">* <?php echo $WAYErr;?></span>

        <br><br>

        <label id = "label_region" name = "label_region" for="region">Choose a Region:</label> 
        <select id="region" name="region">
            <option id="region" name="region" value=""> Select Region</option>
            <option id="region" name="region" value="Americas">Americas</option>
            <option id="region" name="region" value="Asian Pacific">Asian Pacific</option>
            <option id="region" name="region" value="European">European</option>  </select>
            <span class="error">* <?php echo $regionErr;?></span>
        <br><br>

        <label id = "label_phonenumber" name = "label_phonenumber" for="phonenumber"> Phone Number: </label> <input type="tel" placeholder = "0000000000" id = "phonenumber" name="phonenumber"<?php if (!empty($_POST['phonenumber'])) {echo "value=\"" . $_POST["phonenumber"] . "\"";} ?>>
        <span class="error">* <?php echo $phonenumberErr;?></span>

        <br><br>
        
        <label id = "label_comment" name = "label_comment" for="comment">Write your message</label>
        <textarea id = "comment" name="comment" pattern='[A-Za-z0-9\s]{8,60}'><?php if (!empty($_POST['comment'])) {echo "value=\"" . $_POST["comment"] . "\"";} ?></textarea>
            
        <br><br>

        <label id = "label_agree" name = "label_agree" for = "agree">Does this look correct?</label> <input type="checkbox"  id = "agree" name="agree" value ="agree" >
        <span class="error">* <?php echo $agreeErr;?></span>

        <br><br>

        <input type="submit" id ="submit" name="submit" value="Submit">  

    </form>

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