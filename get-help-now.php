<?php include './components/header.php'?>

<h1 class="services-main-header text-bcg">Get Help Now</h1>

<div class="container services-asides">

    <main class="ghn-content">
        <section>
            <h1 class="hdww-header">Fill up the form blah bvlah</h1>

            <p>Some more blah blah blah we will get you back blah blah blah super content</p>
            <p>All fields are required</p>

        </section>

        <section class="ghn-form-wrapper">
            
            <form class="ghn-form" method="POST">
                <div class="ghn-form-input-wrapper">
                    <div class="ghn-form-left">
                        <input type="text" id="g-recaptcha-response" name="g-recaptcha-response" />
                        <input class="ghn-input" type="text" id="name" name="user_name" placeholder="First name" />
                        <input class="ghn-input" type="email" id="mail" name="user_email" placeholder="Last name" />
                        <input class="ghn-input" type="email" id="mail" name="user_email" placeholder="Email address" />
                        <input class="ghn-input" type="email" id="mail" name="user_email" placeholder="Phone number" />
                        <input class="ghn-input" type="email" id="mail" name="user_email" placeholder="Lender" />
                    </div>
                    <textarea id="msg" name="user_message" placeholder="Short description"></textarea>
                </div>
                <input class="ghn-submit" type="submit" value="Submit">
            </form>
<?php

if($_POST){
    function getCaptcha($SecretKey){
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }
    $Return = getCaptcha($_POST['g-recaptcha-response']);
    if($Return -> success == true && $Return -> score > 0.5){
        echo 'success';
    }else{
        echo 'fail';
    }
}




// define variables and set to empty values
$firstNameErr = $lastNameErr = $emailErr = $phoneErr = $lenderErr = "";
$name = $email = $gender = $comment = $website = "";








?>
            <script>
                grecaptcha.ready(function() {
                    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'}).then(function(token) {
                     document.getElementById('g-recaptcha-response').value = token;
                    });
                });
  </script>

        </section>
    </main>
</div>


<?php include './components/footer.php' ?>