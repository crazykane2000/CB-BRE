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

        <div class="container-fluid" >
         

          <div class="row" style="min-height: 700px">
            <div class="col-4 ">
              <div class="c-table-responsive@wide">
                 <div style="padding: 30px;background-color: #fff;">
                  <h3>Create Plan Here</h3>
                  <div style="padding: 10px;"></div>
                  <hr style="opacity: .2" />
                  <div style="padding: 10px;"></div>
                   <form action="plan_handle.php" method="POST" enctype="">
                     <div class="row">
                       <div class="col-sm-12">
                         <div class="form-group">
                           <label class="c-field__label" >Name Skill Set</label>
                           <input type="text" name="disease" required="" placeholder="Enter Skill Set" class="c-input" />
                         </div>
                       </div>


                       <div class="col-sm-12">
                         <div class="form-group">
                          <div style="padding: 5px"></div>
                           <label class="c-field__label" >Reward</label>
                           <input type="text" placeholder="Reward Per Record" required="" name="reward" class="c-input" />
                         </div>
                       </div>

                       

                       <div class="col-sm-8">
                        <hr style="margin:20px 0px;opacity: .2" />
                         <button class="c-btn c-btn--success u-mb-xsmall">Create Plan</button>
                       </div>
                     </div>
                   </form>

                 </div>
              </div>
            </div>

            <div class="col-8 ">
              <div class="c-table-responsive@wide">
                 <div style="padding: 30px;background-color: #fff;">
                  <h3>View Plan Here</h3>
                  <div style="padding: 10px;"></div>
                  <hr style="opacity: .2" />
                  <div style="padding: 10px;"></div>
                    <div class="c-table-responsive@wide">
            <table class="c-table">
              <thead class="c-table__head">
                <tr class="c-table__row">
                  <th class="c-table__cell c-table__cell--head">S.No</th>
                  <th class="c-table__cell c-table__cell--head">Skill Sets</th>
                  <th class="c-table__cell c-table__cell--head">Reward</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  try {
                        $stmt = $pdo->prepare('SELECT * FROM `plan` WHERE `tx`="'.$pdo_auth['tx_address'].'"');
                    } catch(PDOException $ex) {
                        echo "An Error occured!"; 
                        print_r($ex->getMessage());
                    }
                    $stmt->execute();
                    $user = $stmt->fetchAll();   
                    $i=1; 
                    
                    foreach($user as $key=>$value){  
                    

                      echo '<tr class="c-table__row">
                            <td class="c-table__cell">'.$i.'</td>
                            <td class="c-table__cell"><button class="c-btn c-btn--small">'.$value['disease'].'</button></td>
                            <td class="c-table__cell">'.$value['reward'].'</td>
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
          </div>
          
          <?php include 'footer.php'; ?>
        </div>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>



  </body>

</html>