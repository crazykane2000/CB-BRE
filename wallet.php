<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $price_bbt = 1;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Wallet  | Career BuilderCBT</title>
    <meta name="description" content="Career BuilderCBT">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/neat.minc619.css?v=1.0">
    <style type="text/css">
      td{padding: 10px;}
    </style>
  </head>
  <body>

    <div class="o-page">
      <?php include 'sidebar.php'; ?>

      <main class="o-page__content">
        <?php include 'header.php'; ?>

        <div class="container-fluid">
         

          <div style="padding: 20px;"></div>

          <div class="row" style="min-height: 70vh">
            <div class="col-7">
              <nav class="c-tabs" style="min-height: 700px">
            <div class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
              <a class="c-tabs__link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Wire Transfer</a>
              <a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Buy Via Bitcoin</a>
              <a class="c-tabs__link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Buy Via  Ethereum</a>

              <a class="c-tabs__link" id="nav-dodo-tab" data-toggle="tab" href="#nav-dodo" role="tab" aria-controls="nav-dodo" aria-selected="false">Buy Via Plaid</a>

            </div>
            <div class="c-tabs__content tab-content" id="nav-tabContent">
              <div class="c-tabs__pane active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <h4>Bank WIRE Transfer</h4>
                <h6 style="color: #888">Min. 10,000 USD and Max 50,000,000 USD</h6>
                <h6 style="color:#888">Processing Time : 1 to 5 Working Days</h6>
                <br/>
                <table class="c-table">
                    <thead class="c-table__head">
                        <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                            <td  style="width: 130px">Company </td>
                            <td>Career BuilderCBT Company</td>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        <tr>
                            <td>Company Address</td>
                            <td>Crystal Design Center (CDC), 1448/4, J2 Building, 2nd Floor Suite 201-203, Ladprao 87 Pradit Manutham Rd. , Klongchan Bangkapi, Bangkok Thailand 10240</td>
                        </tr>
                        <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                            <td>Bank Address</td>
                            <td>NO. 1 QUEEN'S ROAD CENTRAL HONG KONG </td>
                        </tr>
                        <tr>
                            <td>Bank Name</td>
                            <td>HSBC HONG KONG</td>
                        </tr>
                        <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                            <td>Account No. </td>
                            <td>787896789698765487658764785647386534</td>
                        </tr>
                        <tr>
                            <td>SWIFT Code. </td>
                            <td>8756745675675GGJHFGHN</td>
                        </tr>
                    </tbody>
                </table>
                <div style="padding: 10px;"></div>
                <button class="c-btn c-btn--large" data-toggle="modal" data-target="#modal1a">Buy Via Bank Transfer</button>
              </div>

              <div class="c-tabs__pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <center>
                  <img src="data:image/png;base64,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" style="width: 200px">
                  <br/><br/><b>BTC Address</b> : <?php echo $pdo_auth['tx_address']; ?>
                  <br/><br/>
                  <div style="padding: 14px;background-color: #064971;color:#fff;width: 80%">
                      Please Transfer your BTC to Above Address, and Update the Amount Sent and CB Token Requested. Once We Get BTC in Our Wallet we will Recharge you wallet with equivelent amount of CB Token.
                  </div>
                  <div style="padding: 10px;"></div>
                  <button class="c-btn c-btn--large" data-toggle="modal" data-target="#modal1b">Buy From BTC</button>
                </center>

              </div>
              <div class="c-tabs__pane" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <center>
                  <img src="data:image/png;base64,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" style="width: 200px">
                  <br/><br/><b>ETH Address</b> : 0x97765d73011b034f9007139401cf6009f2a35645
                  <br/><br/>
                  <div style="padding: 14px;background-color: #064971;color:#fff;width: 80%">
                      Please Transfer your Ethereum to Above Address, and Update the Amount Sent and CB Token Requested. Once We Get BTC in Our Wallet we will Recharge you wallet with equivelent amount of CB Token.
                  </div>
                  <div style="padding: 10px;"></div>
                  <button class="c-btn c-btn--large" data-toggle="modal" data-target="#modal1c">Buy From ETH</button>
                </center>
              </div>

              <div class="c-tabs__pane" id="nav-dodo" role="tabpanel" aria-labelledby="nav-dodo-tab">
                <center>
                  <br/><br/>
                  <div style="padding: 14px;background-color: #064971;color:#fff;width: 80%">
                      Coming Soon
                  </div>
                  <div style="padding: 10px;"></div>
                  <!-- <button class="c-btn c-btn--large" data-toggle="modal" data-target="#modal1c">Buy From ETH</button> -->
                </center>
              </div>
            </div>
          </nav>


         
                <div class="c-modal modal fade" id="modal1a" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true" style="display: none;">
                    <div class="c-modal__dialog modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="c-card u-p-medium u-mh-auto" style="max-width:500px;">
                                <h3 style="font-size: 20px;">Please Enter Details for Buying CB Tokens</h3>
                                <p>1$ = 1 CB Token</p>
                                <hr style="margin:20px 0px;opacity: .2">
                                <form action="buy_handle.php" method="POST">
                                 <div style="padding: 0px;">
                                   <div class="form-group">
                                     <label class="c-field__label">Enter amount you transferred</label>
                                     <input type="text" name="amount" id="amty" value="000" class="c-input u-mb-small" placeholder="Enter Dollar Here">
                                   </div>
                                   <div class="form-group">
                                     <label class="c-field__label">Total CB Token you would recieve</label>
                                     <input type="text" name="bbt" value="000" id="bbty" class="c-input u-mb-small" placeholder="Enter No. of CB Token to Buy">
                                   </div>
                                   <input type="hidden" name="currency" value="Dollar">

                                     <div class="form-group">
                                     <label class="c-field__label">Enter bank transaction Id</label>
                                     <input type="text" name="tx_idd" id="tx_idd" required=""  class="c-input u-mb-small" placeholder="Enter Transaction Id Here">
                                   </div>

                                   <div class="form-group">
                                     <label class="c-field__label">Auto Generated Reference Id</label>
                                     <input type="text" name="auto" id="auto" value="0x<?php echo random_strings(30); ?>"  class="c-input u-mb-small" placeholder="Enter Auto Generated Reference Id">
                                   </div>

                                    <div class="form-group">
                                     <button type="submit" class="c-btn c-btn--fullwidth c-btn--info" >Request Buy Token </button>
                                   </div>
                                 </div>
                               </form>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="c-modal modal fade" id="modal1b" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true" style="display: none;">
                    <div class="c-modal__dialog modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="c-card u-p-medium u-mh-auto" style="max-width:500px;">
                              <?php    
                                  $btc = file_get_contents("https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=USD");
                                  $price_bbt = 1;
                                  $data = json_decode($btc, TRUE);
                                 // print_r($price_bbt);
                                  $btc = $data[0]['price_usd'];
                                  //echo $btc;
                                  $price_bbt = $price_bbt;
                                  //echo $price_bbt;
                                  $no_of_bbt_by_btc = ($btc/$price_bbt);
                                  //echo $no_of_bbt_by_btc;            
                              ?>
                                <h3 style="font-size: 20px;">Please Enter Details for Buying CB Tokens</h3>
                                <p>1 BTC = <?php echo $no_of_bbt_by_btc; ?> CB Token</p>
                                <hr style="margin:20px 0px;opacity: .2">
                                <form action="buy_handle.php" method="POST">
                                 <div style="padding: 0px;">
                                   <div class="form-group">
                                     <label class="c-field__label">Enter Amount</label>
                                     <input type="text" name="amount" id="bamty" value="000" class="c-input u-mb-small" placeholder="Enter Bitcoin Here">
                                   </div>
                                   <div class="form-group">
                                     <label class="c-field__label">Total CB Token</label>
                                     <input type="text" name="bbt" value="000" id="bbbt" class="c-input u-mb-small" placeholder="Enter No. of CB Token to Buy">
                                   </div>
                                   <input type="hidden" name="currency" value="Bitcoin">

                                     <div class="form-group">
                                     <label class="c-field__label">Enter Transaction Id</label>
                                     <input type="text" name="tx_idd" id="tx_idd" required=""  class="c-input u-mb-small" placeholder="Enter Transaction Id Here">
                                   </div>


                                   <div class="form-group">
                                     <label class="c-field__label">Auto Generated Reference Id</label>
                                     <input type="text" name="auto" id="auto" value="0x<?php echo random_strings(30); ?>"  class="c-input u-mb-small" placeholder="Enter Auto Generated Reference Id">
                                   </div>


                                    <div class="form-group">
                                     <button type="submit" class="c-btn c-btn--fullwidth c-btn--info" >Request Buy Token </button>
                                   </div>
                                 </div>
                               </form>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="c-modal modal fade" id="modal1c" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true" style="display: none;">
                    <div class="c-modal__dialog modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="c-card u-p-medium u-mh-auto" style="max-width:500px;">
                              <?php    
                                  $ether = file_get_contents("https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD");
                                  $data = json_decode($ether, TRUE);
                                  //print_r($data);
                                  $ether = $data[0]['price_usd'];
                                 // print_r($ether);
                                  $price_bbt = 1;
                                  $no_of_bbt_by_ether = ($ether/$price_bbt);  

                              ?>
                                <h3 style="font-size: 20px;">Please Enter Details for Buying CB Tokens</h3>
                                <p>1 ETH = <?php echo $no_of_bbt_by_ether; ?> CB Token</p>
                                <hr style="margin:20px 0px;opacity: .2">
                                <form action="buy_handle.php" method="POST">
                                 <div style="padding: 0px;">
                                   <div class="form-group">
                                     <label class="c-field__label">Enter Amount</label>
                                     <input type="text" name="amount" id="eamty" value="000" class="c-input u-mb-small" placeholder="Enter Ethereum Here">
                                   </div>
                                   <div class="form-group">
                                     <label class="c-field__label">Total CB Token</label>
                                     <input type="text" name="bbt" value="000" id="ebbty" class="c-input u-mb-small" placeholder="Enter No. of CB Token to Buy">
                                   </div>
                                   <input type="hidden" name="currency" value="Ethereum">

                                     <div class="form-group">
                                     <label class="c-field__label">Enter Transaction Id</label>
                                     <input type="text" name="tx_idd" id="tx_idd" required=""  class="c-input u-mb-small" placeholder="Enter Transaction Id Here">
                                   </div>


                                   <div class="form-group">
                                     <label class="c-field__label">Auto Generated Reference Id</label>
                                     <input type="text" name="auto" id="auto" value="0x<?php echo random_strings(30); ?>"  class="c-input u-mb-small" placeholder="Enter Auto Generated Reference Id">
                                   </div>
                                    <div class="form-group">
                                     <button type="submit" class="c-btn c-btn--fullwidth c-btn--info" >Request Buy Token </button>
                                   </div>
                                 </div>
                               </form>
                               
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-4">
              <div class="c-table-responsive@wide">
                 <div style="padding: 30px;background-color: #fff;min-height: 700px">
                  <h3 style="font-size: 18px;">Career BuilderCBT Wallet Token Balance</h3>
                  <div style="padding: 10px;"></div>
                  <hr style="opacity: .2" /><div style="padding: 10px;"></div>
                  <h1 style="color: #2196f3"><?php $balance =  get_wallet_balance($pdo_auth['tx_address']);
                        $balance = json_decode($balance,true);
                        $balance = $balance['walletBalance'];
                        echo $balance." CBT";
                  ?></h1>
                  <div style="padding: 10px;"></div>
                  <p style="">This is Career BuilderCBT balance and must not be compared with other fiat currencies. However the value of CB Tokens. depends on market current value and may change from time to time. </p>

                  <hr style="margin: 20px 0px;opacity: .2">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" style="width: 300px">
                  <br/>
                  <div style="word-wrap: break-word"><b style="color: green">Career BuilderCBT Address : </b> <?php echo $pdo_auth['tx_address']; ?></div>
                 </div>
              </div>
            </div>
          </div>
         
          <?php include 'footer.php'; ?>
        </div>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        // Dollar Money Starts Here
        $("#amty").keyup(function(){
        var price = 1;
        //alert(price);
        var amt = $("#amty").val();
        var bbt = amt/price;
        $("#bbty").val(bbt.toFixed(2));
       });

       $("#bbty").keyup(function(){
        var price = parseFloat(<?php echo $price_bbt; ?>);
        //alert(price);
        var bbt = $("#bbty").val();
        var amt = bbt*price;
        $("#amty").val(amt.toFixed(2));
       });

        // Bitcoin Starts Here
        $("#bamty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_btc; ?>);
          //alert(price);
          var amt = $("#bamty").val();
          var bbt = amt*price;
          $("#bbbt").val(bbt.toFixed(2));
         });

         $("#bbbt").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_btc; ?>);
          //alert(price);
          var bbt = $("#bbbt").val();
          var amt = bbt/price;
          $("#bamty").val(amt.toFixed(2));
         });
       //Bitcoin Ends Here


      // Ethereum
      // ether Starts Here
        $("#eamty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_ether; ?>);
          //alert(price);
          var amt = $("#eamty").val();
          var bbt = price*amt;
          $("#ebbty").val(bbt.toFixed(2));
         });

         $("#ebbty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_ether; ?>);
          //alert(price);
          var bbt = $("#ebbty").val();
          var amt = bbt/price;
          $("#eamty").val(amt.toFixed(2));
         });
       //Ether Ends Here


      });
    </script>


  </body>

</html>