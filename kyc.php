<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
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
    <link rel="stylesheet" href="css/neat.minc619.css?v=1.0">
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
      <?php include 'sidebar.php'; ?>

      <main class="o-page__content">
        <?php include 'header.php'; ?>

        <div class="container-fluid">
          <div class="row" style="min-height: 75vh">
             <div class="col-4">
              <div class="card-box items" style="height: 479px;color: #333;font-size: 14px;">
                <div style="padding: 10px;"></div>
                 <div class="century" style="font-size: 20px;color: #117ddf"> KYC Documents Rules</div>
                    <div class="century" style="font-size: 15px;color: #848d98">Know Your Customer - KYC enables Career Builder to know/ understand their customers and their financial dealings, to be able to serve them better and manage its risks prudently.</div>

                    <hr style="margin:10px 0px;opacity: .4">
                    <h3 style="color: #117ddf;font-size:20px;">Purpose : </h3>
                    <ul style="color: #848d98;text-align:left;font-sixe:10px;">
                      <li>Verify the legal status of the legal person/ entity</li>
                      <li>Verify identity of the authorized signatories and</li>
                      <li>Verify identity of the Beneficial owners/ controllers of the account</li>
                    </ul>
                    <br/>
                    <h3 style="color: #117ddf;font-size:20px;">What can be used</h3>
                    <ul style="color: #333;text-align:left;">
                      <li>Passport</li>
                      <li>Voter's Identity Card</li>
                      <li>Driving Licence</li>
                      <li>Citizen Card</li>
                      <li>Account Number Card</li>

                    </ul>
                    <div style="padding:20px"></div>
              </div>
             </div>
            <div class="col-4">
              <div class="card-box items" style="height: 479px;">
                      <div style="padding:10px"></div>               
                        <div class="century" style="font-size: 20px;color: #333"> Upload your KYC Documents</div>
                        <div class="century" style="font-size: 13px;color: #222">You Must Upload a Government Authorised   <b style="color: red">Document</b> For Trading in Iotied </div>
                        <div style="padding:20px"></div>
                       <center>
                         <form method="POST" action="kyc_handle.php" enctype="multipart/form-data">
                           <div class="form-group">
                              <input type="text" class="c-input" value="<?php echo $pdo_auth['name']; ?>" name="name" placeholder="Enter Your Name">
                              <div style="padding:10px;"></div>
                           </div>
                           

                           <div class="form-group">
                              <input type="text" class="c-input" readonly="" name="email" value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter Your Email Id">
                              <div style="padding:10px;"></div>
                           </div>
                           

                            <div class="form-group">
                              <input type="text" class="c-input" name="tx_address" readonly="" value="<?php echo $pdo_auth['tx_address'];  ?>" placeholder="Enter ETH Address">
                              <div style="padding:10px;"></div>
                           </div>
                           

                            <div class="form-group">
                              <input type="file" class="c-input" name="file" placeholder="Upload Your Original KYC Document">
                              <div style="padding:10px;"></div>
                           </div>
                           

                           <button class="c-btn c-btn--success u-mb-xsmall" style="width: 100%" type="sumbit" name="submit">UPLOAD YOUR DOCUMENTS</button>
                         </form>
                       </center>
                       
                   </div>
            </div>

            <div class="col-4">
              <div class="card-box items" style="height: 479px;">
                <div style="padding: 10px;"></div>
                 <h3 style="color: #333;text-align:left;font-size: 20px">KYC Documents </h3>
                   <table style="color: #333;" class="c-table">
                    <thead class="c-table__head">
                       <tr>
                         <th class="c-table__cell c-table__cell--head">S.No.</th>
                         <th class="c-table__cell c-table__cell--head">Document</th>
                         <th class="c-table__cell c-table__cell--head">Status</th>
                       </tr>
                    </thead>
                    <tbody>
                      <?php 
                            try {
                                  $stmt = $pdo->prepare('SELECT * FROM `kyc` WHERE `user_id`="'.$pdo_auth['id'].'"  ORDER BY date DESC');
                              } catch(PDOException $ex) {
                                  echo "An Error occured!"; 
                                  print_r($ex->getMessage());
                              }
                              $stmt->execute();
                              $user = $stmt->fetchAll();   
                              $i=1; 
                              foreach($user as $key=>$value){
                                  $statys = '<label class="c-badge c-badge--small c-badge--danger">Pending</label>';
                                  if($value['status']!="Pending"){
                                  $statys = '<label class="c-badge c-badge--small c-badge--success">Approved</label>';
                                }

                                echo '<tr>
                                    <td>'.$i.'</td>
                                    <td><a target="_blank" href="kyc_documents/'.$value['file'].'" style="color:#555;text-decoration:underline">Document'.$i.'</a></td>
                                    <td>'.$statys.'</td>                              
                                  </tr>';
                                  $i++;
                            }           
                          ?>                           
                  </tbody>
                </table>
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