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
    <style type="text/css">
      .card-box{
        padding: 20px;
        background-color: #fff;
      }
      td
      {padding: 10px}
    </style>
  </head>
  <body>

    <div class="o-page">
      <?php include 'sidebar_admin.php'; ?>

      <main class="o-page__content">
        <?php include 'header_admin.php'; ?>

        <div class="container-fluid">
          <div class="row" style="min-height: 75vh">
             

            <div class="col-12">
              <div class="card-box items" style="height: 479px;">
                <div style="padding: 10px;"></div>
                 <h3 style="color: #333;text-align:left;font-size: 20px">KYC Documents </h3>
                 <hr style="opacity: .3;margin:20px 0px;">
                   <table style="color: #333;" class="c-table">
                    <thead class="c-table__head">
                       <tr>
                         <th class="c-table__cell c-table__cell--head">S.No.</th>
                         <th class="c-table__cell c-table__cell--head">Document</th>
                         <th class="c-table__cell c-table__cell--head">Vendor</th>
                         <th class="c-table__cell c-table__cell--head">Date</th>
                         <th class="c-table__cell c-table__cell--head">Doc. Attachment</th>
                         <th class="c-table__cell c-table__cell--head">Status</th>
                         <th class="c-table__cell c-table__cell--head">Action</th>
                       </tr>
                    </thead>
                    <tbody>
                      <?php 
                            try {
                                  $stmt = $pdo->prepare('SELECT * FROM `kyc` ORDER BY date DESC');
                              } catch(PDOException $ex) {
                                  echo "An Error occured!"; 
                                  print_r($ex->getMessage());
                              }
                              $stmt->execute();
                              $user = $stmt->fetchAll();   
                              $i=1; 
                              foreach($user as $key=>$value){
                                 $btn = '<a href="approve_kyc.php?id='.$value['id'].'&user_id='.$value['user_id'].'"><button class="c-btn c-btn--small c-btn--success">Approve</button></a>';
                                  $statys = '<label class="c-badge c-badge--small c-badge--danger">Pending</label>';
                                  if($value['status']!="Pending"){
                                  $statys = '<label class="c-badge c-badge--small c-badge--success">Approved</label>';
                                  $btn = '<button class="c-btn c-btn--small c-btn--info">Approved</button>';
                                }

                                echo '<tr>
                                    <td>'.$i.'</td>
                                    <td>'.$value['document_name'].'<br/><span style="font-size:12px;">Date : '.$value['date'].'</span></td>
                                    <td><b style="color:#333;">'.$value['username'].'</b><br/> Email : '.$value['email'].'</td>
                                    <td>'.$value['date'].'</td>
                                    <td><a target="_blank" href="kyc_documents/'.$value['file'].'" style="color:#555;text-decoration:underline">Document'.$i.'</a></td>
                                    <td>'.$statys.'</td> 
                                    <td>'.$btn.'</td>                             
                                  </tr>';
                                  $i++;
                            }           
                          ?>                           
                  </tbody>
                </table>
              </div>
            </div>

            
          </div>
         <?php include '../footer.php'; ?>
        </div>
      </main>
    </div>
    <script src="../js/neat.minc619.js?v=1.0"></script>
    



  </body>

</html>