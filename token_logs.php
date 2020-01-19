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
    <title>Token Logs  | Iotied</title>
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
         

          <div style="padding: 20px;"></div>

          <div class="row">
            <div class="col-12">
              <div class="c-table-responsive@wide">
                 <div style="padding: 30px;background-color: #fff;">
                  <h3>View Token Logs</h3>
                  <div style="padding: 10px;"></div>
                  <hr style="opacity: .1" />
                   
                   <table class="c-table">
                    <thead class="c-table__head">
                      <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">S.No</th>
                        <th class="c-table__cell c-table__cell--head">Tx_address</th>
                        <th class="c-table__cell c-table__cell--head">Amount</th>
                        <th class="c-table__cell c-table__cell--head">From</th>
                        <th class="c-table__cell c-table__cell--head">Date</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                      $i=1;
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                              CURLOPT_PORT => "3005",
                              CURLOPT_URL => "http://13.233.7.230:3005/api/dataManager/get/tokenLogs",
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => "",
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 30,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => "GET",
                              CURLOPT_POSTFIELDS => "",
                              CURLOPT_HTTPHEADER => array(
                                "Content-Type: application/json",
                                "Postman-Token: e386aebd-a0e2-4469-aaa3-7972d2ceaddd",
                                "cache-control: no-cache"
                              ),
                            ));

                            $response = curl_exec($curl);
                            $err = curl_error($curl);

                            curl_close($curl);

                            if ($err) {
                              echo "cURL Error #:" . $err;
                            } else {
                                $response = json_decode($response,true);
                                foreach ($response as $key => $value) {
                                  if ($value['receiverAddress']!=$pdo_auth['tx_address']) {
                                    continue;
                                  }

                                  echo '<tr class="c-table__row">
                                          <td class="c-table__cell">'.$i.'</td>
                                          <td class="c-table__cell"><b style="color:#333;">'.$value['address'].'</b><br/>Recieved at : '.$value['receiverAddress'].'</td>
                                          <td class="c-table__cell">'.$value['amount'].'</td>
                                          <td class="c-table__cell">'.$value['senderAddress'].'</td>
                                          <td class="c-table__cell">'.date('d/m/Y H:i:s', ($value['timestamp']/1000000000)).'</td>
                                        </tr>';
                                      $i++;
                                }
                             
                            }
                            
                                   
                      ?>    
                    </tbody>
                  </table>

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