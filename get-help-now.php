<?php 
include './components/header.php';

require_once './recaptcha-master/src/autoload.php';
$secret = '6LdkopkUAAAAAESNyGoVVixcLIfMsoGVLl7j-BuE';
$recaptcha = new \ReCaptcha\ReCaptcha($secret);

$gRecaptchaResponse = $_POST['g-recaptcha-response'];
$remoteIp = $_SERVER['REMOTE_ADDR'];

$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$resp = $recaptcha->setExpectedHostname('stophomerepossession.co.uk')
                  ->verify($gRecaptchaResponse, $remoteIp);

$SITE_KEY = '6LdkopkUAAAAAESNyGoVVixcLIfMsoGVLl7j-BuE';
$SECRET_KEY = '6LdkopkUAAAAAEjd9KdQIYD6ysbsmV9dzMuIIA9Y';


// define variables and set to empty values
$firstNameErr = $lastNameErr = $emailErr = $phoneErr = $lenderErr = $messageErr = $captchaErr = "";
$firstName = $lastName = $email = $phone = $lender = $message = "";
$succMsg = '';
$success = true;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First name is required";
        $success = false;
      } else {
        $firstName = test_input($_POST["firstName"]);
        // check if firstName only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
          $firstNameErr = "Only letters and white space allowed"; 
          $success = false;
        }
      }
  
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last name is required";
        $success = false;
    } else {
        $lastName = test_input($_POST["lastName"]);
        // check if lastName only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
        $lastNameErr = "Only letters and white space allowed"; 
        $success = false;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $success = false;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format"; 
        $success = false;
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $success = false;
    } else {
    $phone = test_input($_POST["phone"]);
    // check if phone number is well-formed
    if (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
        $phoneErr = "Invalid phone format"; 
        $success = false;
        }
    }

    if (empty($_POST["lender"])) {
        $lenderErr = "Lender's name is required";
        $success = false;
    } else {
        $lender = test_input($_POST["lender"]);
    // check if lender only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $lender)) {
        $lenderErr = "Only letters and white space allowed";
        $success = false; 
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Short description is required";
        $success = false;
    } else {
        $message = test_input($_POST["message"]);
    }

    $secret = "6LdkopkUAAAAAEjd9KdQIYD6ysbsmV9dzMuIIA9Y";

    if ($resp->isSuccess()) {
        $succMsg = 'success';
    } else {
        $succMsg = $resp->getErrorCodes();
    }


    
    // $secret = "6LdkopkUAAAAAEjd9KdQIYD6ysbsmV9dzMuIIA9Y";
    
    
  $firstName = test_input($_POST["firstName"]);
  $lastName = test_input($_POST["lastName"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $lender = test_input($_POST["lender"]);
  $message = test_input($_POST["message"]);

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
                        <input class="ghn-input" value="<?php echo isset($_POST["firstName"]) ? $_POST["firstName"] : ''; ?>" type="text" id="name" name="firstName" placeholder="First name" />

                        <div class="validate-error"><?php echo $lastNameErr;?></div>
                        <input class="ghn-input" value="<?php echo isset($_POST["lastName"]) ? $_POST["lastName"] : ''; ?>" type="text" name="lastName" placeholder="Last name" />

                        <div class="validate-error"><?php echo $emailErr;?></div>
                        <input class="ghn-input" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" type="email" name="email" placeholder="Email address" />

                        <div class="validate-error"><?php echo $phoneErr;?></div>
                        <input class="ghn-input" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>" type="tel" name="phone" placeholder="Phone number" />

                        <div class="validate-error"><?php echo $lenderErr;?></div>
                        <input class="ghn-input" value="<?php echo isset($_POST["lender"]) ? $_POST["lender"] : ''; ?>" type="text" name="lender" placeholder="Lender's name" />
                    </div>
                    <div class="validate-error"><?php echo $messageErr;?></div>
                    <textarea id="msg" name="message" placeholder="Short description"><?php echo isset($_POST["message"]) ? $_POST["message"] : ''; ?></textarea>
                </div>
                <div class="form-bellow">
                    <div class="validate-error"><?php echo $captchaErr;?></div>
                    <div class="g-recaptcha" data-sitekey="6LdkopkUAAAAAESNyGoVVixcLIfMsoGVLl7j-BuE"></div>
                    <input class="ghn-submit" type="submit" value="Submit">
                </div>
            </form>

            

        </section>
    </main>
</div>


<?php include './components/footer.php' ?>


