<?php include './components/header.php'?>
<?php

define('SITE_KEY', '6LdkopkUAAAAAESNyGoVVixcLIfMsoGVLl7j-BuE');
define('SECRET_KEY', '6LdkopkUAAAAAEjd9KdQIYD6ysbsmV9dzMuIIA9Y');

// define variables and set to empty values
$firstNameErr = $lastNameErr = $emailErr = $phoneErr = $lenderErr = $messageErr = $captchaErr = "";
$firstName = $lastName = $email = $phone = $lender = $message = "";
$succMsg = '';
$success = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First name is required";
      } else {
        $firstName = test_input($_POST["firstName"]);
        // check if firstName only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
          $firstNameErr = "Only letters and white space allowed"; 
        }
      }
  
      if (empty($_POST["lastName"])) {
          $lastNameErr = "Last name is required";
        } else {
          $lastName = test_input($_POST["lastName"]);
          // check if lastName only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
            $lastNameErr = "Only letters and white space allowed"; 
          }
        }
  
      if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
          }
        }
  
      if (empty($_POST["phone"])) {
          $phoneErr = "Phone number is required";
      } else {
      $email = test_input($_POST["email"]);
      // check if phone number is well-formed
      if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
          $phoneErr = "Invalid phone format"; 
          }
      }
  
      if (empty($_POST["lender"])) {
          $lenderErr = "Lender's name is required";
      } else {
          $lender = test_input($_POST["lender"]);
      // check if lender only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lender)) {
          $lenderErr = "Only letters and white space allowed"; 
          }
      }
  
      if (empty($_POST["message"])) {
          $messageErr = "Short description is required";
      } else {
          $message = test_input($_POST["message"]);
      }
  
      function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      }
}


    
?>

<h1 class="services-main-header text-bcg">Get Help Now</h1>

<div class="container services-asides">

    <main class="ghn-content">
        <section>
            <h1 class="hdww-header">Fill up the form blah bvlah</h1>

            <p>Some more blah blah blah we will get you back blah blah blah super content</p>
            <p>All fields are required</p>

        </section>

        <section class="ghn-form-wrapper">
            <?php echo $succMsg ?>
            <form class="ghn-form" method="POST">
                <div class="ghn-form-input-wrapper">
                    <div class="ghn-form-left">
                        <input type="text" class="recaptcha-input" id="g-recaptcha-response" name="g-recaptcha-response" />
                        <div class="validate-error"><?php echo $firstNameErr;?></div>
                        <input class="ghn-input" type="text" id="name" name="firstName" placeholder="First name" />
                        <div class="validate-error"><?php echo $lastNameErr;?></div>
                        <input class="ghn-input" type="text" id="mail" name="lastName" placeholder="Last name" />
                        <div class="validate-error"><?php echo $emailErr;?></div>
                        <input class="ghn-input" type="email" id="mail" name="email" placeholder="Email address" />
                        <div class="validate-error"><?php echo $phoneErr;?></div>
                        <input class="ghn-input" type="tel" id="mail" name="phone" placeholder="Phone number" />
                        <div class="validate-error"><?php echo $lenderErr;?></div>
                        <input class="ghn-input" type="text" id="mail" name="lander" placeholder="Lender's name" />
                    </div>
                    <div class="validate-error"><?php echo $messageErr;?></div>
                    <textarea id="msg" name="message" placeholder="Short description"></textarea>
                </div>
                <div class="form-bellow">
                    <div class="validate-error"><?php echo $captchaErr;?></div>
                    <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY;?>"></div>
                    <input class="ghn-submit" type="submit" value="Submit">
                </div>
            </form>

            

        </section>
    </main>
</div>


<?php include './components/footer.php' ?>


