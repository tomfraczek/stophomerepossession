<?php include './components/header.php'?>
<?php include './components/send.php'?>


<h1 class="services-main-header text-bcg">Get Help Now</h1>

<div class="container services-asides">

    <main class="ghn-content">
        <section>
            <h1 class="hdww-header">Fill up the form blah bvlah</h1>

            <p>Some more blah blah blah we will get you back blah blah blah super content</p>
            <p>All fields are required</p>

        </section>

        <section class="ghn-form-wrapper">
            
            <form class="ghn-form" action="./components/send.php" method="POST">
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
                <input class="ghn-submit" type="submit" value="Submit">
            </form>

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