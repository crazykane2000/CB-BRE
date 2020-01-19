<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
    error_reporting( E_WARNING | E_PARSE);
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
      td{
        padding: 6px;
        padding-left: 20px;
        border-bottom: solid 1px #eee;
        text-transform: capitalize;
      }
    </style>
  </head>
  <body>

    <div class="o-page">
      <?php include 'sidebar.php'; ?>

      <main class="o-page__content">
        <?php include 'header.php'; ?>

        <div class="container-fluid">
          <?php include 'dashboard_stats.php'; ?>

          <?php $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_PORT => "3005",
                CURLOPT_URL => "http://13.233.7.230:3005/api/dataManager/get/patients",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "",
                CURLOPT_HTTPHEADER => array(
                  "Postman-Token: aad61225-a932-4834-8fc9-f71d65f52ac2",
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
              } 
              //print_r($response);
              ?>
          <div class="row">
            <div class="col-12">
              <div class="c-table-responsive@wide" style="background-color: #fff;padding: 30px;border-radius: 4px;">
                <table class="c-table">
                  <?php foreach ($response as $key => $value) {     
                 // if ($value['address']!=$_REQUEST['address']) { continue;  }  
                                   
                          foreach ($value as $key_data => $value_data) {
                            if (is_array($value_data)) {
                                foreach ($value_data as $keyos => $valueos) {
                                  if (is_array($valueos)) {
                                    foreach ($valueos as $keyoo => $value00) {
                                      if (is_array($value00)) {
                                        continue;
                                      }
                                      $value00 = str_replace("patient", "Candidate", $value00);
                                      $value00 = str_replace("Patient", "Candidate", $value00);
                                      $keyoo = str_replace("Patient", "Candidate", $keyoo);
                                      $value00 = str_replace("PATIENT", "Candidate", $value00);
                                      echo '<tr>';
                                        echo '<td>'.$keyoo.'</td>';
                                        echo '<td>'.$value00.'</td>';
                                      echo '</tr>';
                                    }
                                  }
                                      $valueos = str_replace("patient", "Candidate", $valueos);
                                      $valueos = str_replace("Patient", "Candidate", $valueos);
                                      $keyos = str_replace("Patient", "Candidate", $keyos);
                                      $valueos = str_replace("PATIENT", "Candidate", $valueos);
                                   echo '<tr>';
                                        echo '<td>'.$keyos.'</td>';
                                        echo '<td>'.$valueos.'</td>';
                                    echo '</tr>';
                                }
                            }  
                                $value_data = str_replace("patient", "Candidate", $value_data);
                                $value_data = str_replace("Patient", "Candidate", $value_data);
                                $key_data = str_replace("Patient", "Candidate", $key_data);
                                $value_data = str_replace("PATIENT", "Candidate", $value_data);
                            echo '<tr>';
                                echo '<td>'.$key_data.'</td>';
                                echo '<td>'.$value_data.'</td>';
                            echo '</tr>';
                          }                   
                    
                        } ?>
                  
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