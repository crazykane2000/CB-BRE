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
    <title>View Access requests  | Career Builders</title>
    <meta name="description" content="Career Builders">
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
         <h4>View Access requests</h4>
         <br/>
           <div class="c-table-responsive@wide" style="min-height: 70vh">
            <table class="c-table">
              <thead class="c-table__head">
                <tr class="c-table__row">
                  <th class="c-table__cell c-table__cell--head">S.No</th>
                  <th class="c-table__cell c-table__cell--head">Producer </th>
                  <th class="c-table__cell c-table__cell--head">Consumer </th>
                  <th class="c-table__cell c-table__cell--head">Status</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  try {
                        $stmt = $pdo->prepare('SELECT * FROM `request_access` WHERE `vendor_tx`="'.$pdo_auth['tx_address'].'"');
                    } catch(PDOException $ex) {
                        echo "An Error occured!";
                        print_r($ex->getMessage());
                    }
                    $stmt->execute();
                    $user = $stmt->fetchAll();  
                    $i=1;
                   
                    foreach($user as $key=>$value){  
                    $status = '<span class="c-badge c-badge--warning c-badge--small " >Pending</span>';
                    if ($value['status']!="Pending") {
                      $status = '<span class="c-badge c-badge--success c-badge--small " >Resolved</span>';
                    }

                    $vendor = get_data_id_data("users","tx_address",$value['vendor_tx']);

                    //print_r($value);
                      echo '<tr class="c-table__row">
                            <td class="c-table__cell">'.$i.'</td>
                            <td class="c-table__cell">You requested Data Access from <br/><b style="color:#333;">'.$value['patient_tx'].'</b> <br/>Via Plan : <b style="color:#333;">'.$value['plan'].'</b> for <b style="color:#333;">'.$value['days'].' Days</b>, for the Cost of <b style="color:#333;">'.$value['reward_point'].' CB Coins</b></td>
                            <td class="c-table__cell"><b style="color:#333;"> '.$vendor['name'].' ('.$vendor['type'].') </b><br/>'.$value['patient_tx'].'</td>
                            <td class="c-table__cell">'.$status.'</td>
                          </tr>';
                        $i++;
                  }          
                ?>    
              </tbody>
            </table>
          </div>

          <div style="padding: 20px;"></div>
            <?php include 'footer.php'; ?>          
        </div>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>  
  </body>

</html>