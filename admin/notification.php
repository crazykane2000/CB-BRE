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
    <title>Support  | Career Builder</title>
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
         

          <div style="padding: 20px;"></div>

          <div class="row" style="min-height: 75vh">
            <div class="col-12">
              <div class="c-table-responsive@wide">
                 <div style="padding: 30px;background-color: #fff;">
                All Notifications </h3>
                  <div style="padding: 20px;"></div>
                   <table class="c-table">
                      <thead class="c-table__head">
                        <tr class="c-table__row">
                          <th class="c-table__cell c-table__cell--head">S.No</th>
                          <th class="c-table__cell c-table__cell--head">Notification</th>
                          <th class="c-table__cell c-table__cell--head">For</th>
                          <th class="c-table__cell c-table__cell--head">Date</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                          $user = fetch_all_popo("notification");  
                            $i=1; 
                            
                            foreach($user as $key=>$value){  
                            $status = '<span class="c-badge c-badge--danger c-badge--small " >Pending</span>';
                            if ($value['status']!="Pending") {
                              $status = '<span class="c-badge c-badge--success c-badge--small " >Resolved</span>';
                            }

                              echo '<tr class="c-table__row">
                                    <td class="c-table__cell">'.$i.'</td>
                                    <td class="c-table__cell"><b style="color:#333;">'.$value['notification'].'</b></td>
                                    <td class="c-table__cell">'.$value['for'].'</td>
                                    <td class="c-table__cell">'.$value['date'].'</td>
                                  </tr>';
                                $i++;
                          }           
                        ?>    
                      </tbody>
                    </table>

                 </div>
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