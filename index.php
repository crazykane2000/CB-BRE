<?php  
    include 'administrator/connection.php';
    include 'administrator/function.php';
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign In | Career Builder</title>
    <meta name="description" content="Career Builder">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/neat.minc619.css?v=1.0">
  </head>
  <body style="background-image: url(img/kel.jpg);background-size: cover;">

    <div class="o-page o-page--center" style="box-shadow: 0px 0px 10px rgba(0,0,10,.5);">
      <div class="o-page__card">
        <div class="c-card c-card--center">
         <img src="img/carre.png" alt="Career Builder" style="width: 200px;">
          <?php see_status($_REQUEST); ?>
          <form method="POST" action="login_redirect.php">
            <div class="c-field">
              <label class="c-field__label">Login as</label>
              <select class="c-input u-mb-small" style="-webkit-appearance:none;" name="type" required>
                <option>Employer</option>
              </select>
            </div>

            <div class="c-field">
              <label class="c-field__label">Email Address</label>
              <input class="c-input u-mb-small" name="user" type="email" placeholder="e.g. user@iotied.com" required>
            </div>
            
            <div class="c-field">
              <label class="c-field__label">Password</label>
              <input class="c-input u-mb-small" type="password" name="pass" placeholder="Numbers, Pharagraphs Only" required>
            </div>

            <button class="c-btn c-btn--fullwidth c-btn--info" name="login">Login</button>
            <br/><br/>
            <a href="register.php">Register Now!</a>
          </form>
        </div>
      </div>
    </div>

    <!-- Main JavaScript -->
    <script src="js/neat.minc619.js?v=1.0"></script>
  </body>
</html>