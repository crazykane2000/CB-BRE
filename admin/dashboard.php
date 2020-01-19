<?php session_start();
    include '../administrator/connection.php';
    include '../administrator/function.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
    error_reporting(E_ALL & ~E_NOTICE);
   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard  | Career Builder</title>
    <meta name="description" content="Career Builder">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/neat.minc619.css?v=1.0">
  </head>
  <body>

    <div class="o-page" >
      <?php include 'sidebar_admin.php'; ?>

      <main class="o-page__content">
        <?php include 'header_admin.php'; ?>

        <div class="container-fluid" >
          <?php include 'dashboard_stats.php'; ?>          

          <div style="padding: 15px;min-height: 35vh"></div>

        
          
         <?php include '../footer.php'; ?>
        </div>
      </main>
    </div>
    <script src="../js/neat.minc619.js?v=1.0"></script>
    

    <div class="c-modal modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1">
        <div class="c-modal__dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="c-card u-p-medium u-mh-auto" style="max-width:500px;">
                    <h3>Whitelisted User Information</h3>
                    <hr/>
                    <div style="padding: 10px;"></div>
                    <table class="c-table" style="font-size: 12px;">
                      <tr style="border-bottom: solid 1px #eee;">
                        <td style="padding:10px;">Address</td>
                        <td style="padding:10px;">0x8db058e36f1672a4cf965be8f349a032c5868c58</td>
                      </tr>

                      <tr style="border-bottom: solid 1px #eee;">
                        <td style="padding:10px;">Patient Id </td>
                        <td style="padding:10px;">0x99058e36f1672a4cf965be8f349a032c5868889</td>
                      </tr>

                      <tr style="border-bottom: solid 1px #eee;">
                        <td style="padding:10px;">DNA </td>
                        <td style="padding:10px;">depEyEGkiOQAOXpk4W4gaIh9MqcBeafFT</td>
                      </tr>

                      <tr style="border-bottom: solid 1px #eee;">
                        <td style="padding:10px;">Biometric Id </td>
                        <td style="padding:10px;">X2tDZmETJIYtq14YtjZLBEfFYCOKGY</td>
                      </tr>

                       <tr style="border-bottom: solid 1px #eee;">
                        <td style="padding:10px;"><img src="../12.png"> </td>
                      </tr>


                    </table>
                    <div style="padding: 10px;"></div>
                    <button class="c-btn c-btn--danger" data-dismiss="modal">
                        Close Now
                    </button>
                </div>
            </div>
        </div>
    </div>


  </body>

</html>