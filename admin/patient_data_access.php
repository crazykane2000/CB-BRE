<?php session_start();
    include '../administrator/connection.php';
    include '../administrator/function.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Patient Data Access  | Career Builder</title>
    <meta name="description" content="Career Builder">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/neat.minc619.css?v=1.0">
  </head>
  <body>

    <div class="o-page">
      <?php include 'sidebar_admin.php'; ?>

      <main class="o-page__content">
        <?php include 'header_admin.php'; ?>

        <div class="container-fluid">
         <h4>View Access requests</h4>
         <br/>
           <div class="c-table-responsive@wide" style="min-height: 700px;background: #fff;">
            <table class="c-table">
              <thead class="c-table__head">
                <tr class="c-table__row">
                  <th class="c-table__cell c-table__cell--head">S.No</th>
                  <th class="c-table__cell c-table__cell--head">Request</th>
                  <th class="c-table__cell c-table__cell--head">Status</th>
                  <th class="c-table__cell c-table__cell--head">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  try {
                        $stmt = $pdo->prepare('SELECT * FROM `request_access` ORDER BY date DESC');
                    } catch(PDOException $ex) {
                        echo "An Error occured!";
                        print_r($ex->getMessage());
                    }
                    $stmt->execute();
                    $user = $stmt->fetchAll();  
                    $i=1;

                   
                   
                    foreach($user as $key=>$value){  
                    $btn = '<a href="approve_access.php?id='.$value['id'].'"><button class="c-btn c-btn--small c-btn--success">Approve</button></a>';
                                  $statys = '<label class="c-badge c-badge--small c-badge--danger">Pending</label>';
                                  if($value['status']!="Pending"){
                                  $statys = '<label class="c-badge c-badge--small c-badge--success">Approved</label>';
                                  $btn = '<button class="c-btn c-btn--small c-btn--info">Approved</button>';
                                }

                    //$patient = get_data_id_data("users","tx_address",$value['patient_tx']);
                    $vendor = get_data_id_data("users","tx_address",$value['vendor_tx']);
                    //print_r($vendor);

                      echo '<tr class="c-table__row">
                            <td class="c-table__cell">'.$i.'</td>
                           <td class="c-table__cell"><b style="color:#222;">'.$vendor['name'].'('.$vendor['tx_address'].')</b><br/> requested Data Access from <br/><b style="color:#333;">'.$value['patient_tx'].'</b> <br/>Via Plan : <b style="color:#333;">'.$value['plan'].'</b> for <b style="color:#333;">'.$value['days'].' Days</b>, for the Cost of <b style="color:#333;">'.$value['reward_point'].' Career Builder Coins</b></td>
                            <td class="c-table__cell">'.$statys.'</td>
                            <td class="c-table__cell">'.$btn.'</td>
                          </tr>';
                        $i++;
                  }          
                ?>    
              </tbody>
            </table>
          </div>

          <div style="padding: 20px;"></div>
            <?php include '../footer.php'; ?>          
        </div>
      </main>
    </div>
    <script src="../js/neat.minc619.js?v=1.0"></script>  
  </body>

</html>