<?php  
    include 'administrator/connection.php';
    include 'administrator/function.php';
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign Up | CareerBuilder</title>
    <meta name="description" content="CareerBuilder">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/neat.min.css">
  </head>
  <body style="background-image: url(img/kel.jpg);background-size: cover;">

    <div class="o-page o-page--center">
      <div class="o-page__card">
        <div class="c-card c-card--center">
          <img src="img/carre.png" alt="Career Builder" style="width: 200px;">

         
          <?php see_status($_REQUEST); ?>
          <form action="register_handle.php" method="POST">
             <div class="c-field">
              <label class="c-field__label">Login as</label>
              <select class="c-input u-mb-small" style="-webkit-appearance:none;" name="type" required>
               <option>Employer</option>
              </select>
            </div>


            <div class="c-field">
              <label class="c-field__label">Name</label>
              <input class="c-input u-mb-small" type="text" name="name" placeholder="e.g. Kinie Sharma" required>
            </div>

            <div class="c-field">
              <label class="c-field__label">Email Address</label>
              <input class="c-input u-mb-small" type="email" name="email" placeholder="e.g. user@CareerBuilder.com" required>
            </div>

            <div class="c-field u-mb-small">
              <label class="c-field__label">Country</label>
              <div class="c-select">
                <select class="c-select__input" name="country">
                  <option>Australia</option>
                  <option>United Kigndom</option>
                  <option>Netherlands</option>
                  <option>United States</option>
                  <option>France</option>
                  <option selected="">India</option>
                </select>
              </div>
            </div>
            
            <div class="c-field u-mb-small">
              <label class="c-field__label">Password</label>
              <input class="c-input" type="password" name="password" placeholder="Numbers, Pharagraphs Only" required>
            </div>

            

            <button name="register" class="c-btn c-btn--fullwidth c-btn--info">Register Now</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Main JavaScript -->
    <script src="js/neat.minc619.js?v=1.0"></script>

    
  </body>
</html>