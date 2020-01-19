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
    <title>Wallet  | Iotied</title>
    <meta name="description" content="Iotied">
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
         

          <div style="padding: 10px;"></div>

          <div class="row" style="min-height: 70vh">
            <div class="col-6">
              <div class="c-table-responsive@wide">
                 <div style="padding: 30px;background-color: #fff;">
                  <h3>Add Token Balance Here</h3>
                  <div style="padding: 10px;"></div>
                  <hr style="opacity: .2" /><div style="padding: 10px;"></div>
                   <form action="wallet_handle.php" method="POST" enctype="">
                     <div class="row">
                       <div class="col-sm-12">
                         <div class="form-group">
                           <label class="c-field__label" >Enter the Amount of Tokens</label>
                           <input type="text" min="0" value="500" name="amount" class="c-input" />
                         </div>
                       </div>

                      

                       <div class="col-sm-12">
                        <hr style="margin:20px 0px;opacity: .2" />
                         <button class="c-btn c-btn--success u-mb-xsmall">Add Tokens to Wallet</button>
                       </div>
                     </div>
                   </form>

                 </div>
              </div>
            </div>

            <div class="col-4">
              <div class="c-table-responsive@wide">
                 <div style="padding: 30px;background-color: #fff;">
                  <h3 style="font-size: 18px;">Wallet Iotied Token Balance</h3>
                  <div style="padding: 10px;"></div>
                  <hr style="opacity: .2" /><div style="padding: 10px;"></div>
                  <h1 style="color: #2196f3"><?php $balance =  get_wallet_balance($pdo_auth['tx_address']); 
                        $balance = json_decode($balance,true);
                        $balance = $balance['walletBalance'];
                        echo $balance." Iot";
                  ?></h1>
                  <div style="padding: 10px;"></div>
                  <p>This is Iotied Balance and must not be compared with Other fiat Currency, However the value of IOTied Tokens depands on market value and may change or exchanged to fiat of equivellent value </p>
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