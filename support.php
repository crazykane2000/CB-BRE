<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Support  | Career Builder</title>
    <meta name="description" content="Career Builder">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/neat.minc619.css?v=1.0">
  </head>
  <body>

    <div class="o-page">
      <?php include 'sidebar.php'; ?>

      <main class="o-page__content">
        <?php include 'header.php'; ?>

        <div class="container-fluid">
         

          <div style="padding: 20px;"></div>

          <div class="row" style="min-height: 75vh">
            <div class="col-12">
              <div class="c-table-responsive@wide">
                 <div style="padding: 30px;background-color: #fff;min-height: 700px">
                  <h3>Enter Your Query Here <a href="view_support.php"><button class="c-btn c-btn--small">View All Request</button></a></h3>
                  <div style="padding: 20px;"></div>
                   <form action="support_handle.php" method="POST" enctype="">
                     <div class="row">
                       <div class="col-sm-4">
                         <div class="form-group">
                           <label class="c-field__label" >Username</label>
                           <input type="text" value="<?php echo $pdo_auth['name']; ?>" name="username" class="c-input" />
                         </div>
                       </div>

                       <div class="col-sm-4">
                         <div class="form-group">
                           <label class="c-field__label" >Subject</label>
                           <input type="text" placeholder="Subject" name="subject" class="c-input" />
                         </div>
                       </div>

                       <div class="col-sm-9">
                        <div style="padding: 10px;"></div>
                         <div class="form-group">
                           <label class="c-field__label" >Query</label>
                           <textarea class="c-input" name="query" placeholder="Enter Your Query" ></textarea>
                         </div>
                       </div>

                       <div class="col-sm-8">
                        <hr style="margin:20px 0px;opacity: .2" />
                         <button class="c-btn c-btn--success u-mb-xsmall">Register Issue</button>
                       </div>
                     </div>
                   </form>

                 </div>
              </div>
            </div>
          </div>
         
          <?php include 'footer.php'; ?>
        </div>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>



  </body>

</html>