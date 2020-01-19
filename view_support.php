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
    <title>View Support  | Career Builder</title>
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

        <div class="container-fluid">
         <h4>Enter Your Query Here <a href="support.php"><button class="c-btn c-btn--small">Add Issue</button></a></h4>
         <br/>
           <div class="c-table-responsive@wide" style="min-height: 70vh">
           <div style="padding: 10px;background-color: #fff;min-height: 700px">
              <table class="c-table">
              <thead class="c-table__head">
                <tr class="c-table__row">
                  <th class="c-table__cell c-table__cell--head">S.No</th>
                  <th class="c-table__cell c-table__cell--head">Query</th>
                  <th class="c-table__cell c-table__cell--head">Status</th>
                  <th class="c-table__cell c-table__cell--head">Date</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  try {
                        $stmt = $pdo->prepare('SELECT * FROM `support` WHERE `username`="'.$pdo_auth['name'].'" ORDER BY date DESC');
                    } catch(PDOException $ex) {
                        echo "An Error occured!";
                        print_r($ex->getMessage());
                    }
                    $stmt->execute();
                    $user = $stmt->fetchAll();  
                    $i=1;
                   
                    foreach($user as $key=>$value){  
                    $status = '<span class="c-badge c-badge--danger c-badge--small " >Pending</span>';
                    if ($value['status']!="Pending") {
                      $status = '<span class="c-badge c-badge--success c-badge--small " >Resolved</span>';
                    }

                    $ans = "";
                    if ($value['answer']!="") {
                      $ans = "<b style='color:green';'>Ans : </b>".$value['answer'];
                    }

                      echo '<tr class="c-table__row">
                            <td class="c-table__cell">'.$i.'</td>
                            <td class="c-table__cell"><b style="color:#333;">'.$value['subject'].'</b><br/>'.$value['query'].'<br/>'.$ans.'</td>
                            <td class="c-table__cell">'.$status.'</td>
                            <td class="c-table__cell">'.$value['date'].'</td>
                          </tr>';
                        $i++;
                  }          
                ?>    
              </tbody>
            </table>
           </div>
          </div>

          <div style="padding: 20px;"></div>
            <?php include 'footer.php'; ?>          
        </div>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>  
  </body>

</html>