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
    <title>Search Data  | Career Builder</title>
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
              <h4>View Candidates</h4>
              <div style="padding: 10px;"></div>
              <div class="c-table-responsive@wide" style="">
               <div style="padding: 10px;min-height: 700px;background-color: #fff;">
                  <table class="c-table">
                  <thead class="c-table__head">
                    <tr class="c-table__row">
                      <th class="c-table__cell c-table__cell--head">Candidate</th>
                      <th class="c-table__cell c-table__cell--head">Block No.</th>
                      <th class="c-table__cell c-table__cell--head">Candidate Id</th>
                      <th class="c-table__cell c-table__cell--head">Country</th>
                      <th class="c-table__cell c-table__cell--head">Disease Tags</th>
                      <th class="c-table__cell c-table__cell--head">Status</th>
                      <th class="c-table__cell c-table__cell--head">Actions</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 

                    function getIfSet(& $var) {
                        if (isset($var)) {
                            return $var;
                        }
                        return null;
                    }


                      foreach ($response as $key => $value) {

                        $btns = '<a class="c-dropdown__item batay dropdown-item" data-toggle="modal" data-id="'.$value['patientAddress'].'" data-target="#modal9909">Request Access</a>';
                        $white = '<label class="c-badge c-badge--danger c-badge--small" style="">Not Contacted</label>';
                       
                        $count = get_count_items_andd("request_access", "vendor_tx", $pdo_auth['tx_address'], "patient_tx", $value['patientAddress']);
                        $rata = get_data_items_andd("request_access", "vendor_tx", $pdo_auth['tx_address'], "patient_tx", $value['patientAddress']);

                       // print_r($rata);
                       
                        if ($count>0) {
                          $btns = '<a class="c-dropdown__item dropdown-item" href="view_data.php?address='.$value['patientAddress'].'">Show Details</a>';
                          $white = '<label class="c-badge c-badge--success c-badge--small" style="">Whitelisted</label>';
                        }elseif ($rata['status']=="Pending") {
                          $btns = '<a class="c-dropdown__item dropdown-item" >Pending Approval</a>';
                          $white = '<label class="c-badge c-badge--warning c-badge--small" style="">Pending</label>';
                        }

                       
                       
                        $disease_tags = $value['patientData']['Disease Tags'];
                        $disease_tags_upper = strtoupper($disease_tags);
                        $sed = strtoupper(trim($_REQUEST['search_term']));

                       

                        $tt = '';
                        if (!in_array(getIfSet($value['patientData']['Disease Tags']), $value)) {
                          $tags = getIfSet($value['patientData']['Disease Tags']); 
                          $tags = explode(",", $tags);
                          foreach ($tags as $key => $value1) {
                            if ($value1=="Cancer") {$value1 = "Coder";}
                            elseif ($value1==" Cholera") {$value1 = "Designer";}
                            elseif ($value1=="Urolithiasis") {$value1 = "Management";}
                            elseif ($value1=="HIV") {$value1 = "Testing";}
                            elseif ($value1=="Polio") {$value1 = "Business";}
                            elseif ($value1=="Poik") {$value1 = "Developer";}
                            elseif ($value1=="cholera") {$value1 = "Developer";}
                               $tt.="<span style='padding:5px;border:solid 1px #8bc34a;border-radius:3px;margin-right:3px;font-size:12px;'>".$value1."</span>";           
                            }                      
                        }   
                        else{
                          $tt = '';
                        }    

                        if ($value['patientData']['ICD Codes']=="") {
                                  continue;
                                }        
                                if ($value['actionPerformed']=="PATIENT UPDATED") {
                          continue;
                        }          

                        echo '<tr class="c-table__row">
                                <td class="c-table__cell">
                                  <div class="o-media">
                                    <div class="o-media__img u-mr-xsmall">
                                      <div class="c-avatar c-avatar--small">
                                        <img class="c-avatar__img" src="img/download.jpg" alt="'.$value['patientData']['First Name']." ".$value['patientData']['Last Name'].'">
                                      </div>
                                    </div>
                                    <div class="o-media__body">
                                      <h6 style="font-size:12px;cursor:pointer;font-weight:bold" data-toggle="modal" data-target="#modal1" >'.substr($value['patientAddress'], 0,16).'...</h6>
                                      <p>'.$value['patientData']['City'].", ".$value['patientData']['State'].", ".$value['patientData']['County'].'</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="c-table__cell">'.$value['blockNumber'].'</td>
                                <th class="c-table__cell" title="'.$value['patientAddress'].'">'.substr($value['patientAddress'], 0,10).'...</th>
                                <td class="c-table__cell">'.ucfirst($value['patientData']['County']).'</td>
                                <td class="c-table__cell">
                                  '.$tt."<span style='padding:5px;border:solid 1px #8bc34a;border-radius:3px;margin-right:3px;font-size:12px;'>".$value['patientData']['ICD Codes']."</span>".'
                                </td>
                               <td>'.$white.'</td>
                                <td class="c-table__cell">
                                  <div class="c-dropdown dropdown">
                                    <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      More <i class="feather icon-chevron-down"></i>
                                    </a>

                                    <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable1">
                                      '.$btns.'
                                    </div>
                                  </div>
                                </td>
                              </tr>';
                      }
                     ?>                   
                  </tbody>
                </table>
                </table>
               </div>
              </div>
            </div>
          </div>          
          <?php include 'footer.php';  ?>
        </div>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>
   
    <div class="c-modal tyui modal fade" id="modal9909" tabindex="-1" role="dialog" aria-labelledby="modal1">
        <div class="c-modal__dialog modal-dialog modal-lg" role="document">
            <form action="request_access_directs.php" method="POST">
              <div class="modal-content">
                <div class="c-card u-p-medium u-mh-auto" style="max-width:500px;">
                    <h3>Request for User Information</h3>
                    <hr style="margin:14px 0px;opacity: .3">
                    <label class="c-label">Select Plan</label>
                    <select class="c-input" name="plan" style="height:40px;background:#ffffff;">
                      <?php
                          $dara = fetch_all_popo_without_date("plan");
                          //print_r($dara);
                          foreach ($dara as $key => $value) {
                            echo '<option>'.$value['disease']." -- ".$value['reward'].'</option>';
                          }
                       ?>
                    </select><br/>

                    <label class="c-label">Enter Duration (in Days)</label>
                    <input type="number" min="1" value="20" class="c-input" placeholder="Enter Duration in Days" name="duration">
                    <br/>

                    <input type="hidden" name="patient_tx" id="patient-id">
                    <a href="terms.php" target="_blank">Terms and Conditions</a>

                    <div style="padding: 10px;"></div>
                    <button class="c-btn c-btn--info"  type="submit">
                        Request For Access
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function () {
          $(".batay").click(function () {
              $("#patient-id").val($(this).data('id'));
              $('.tyui').modal('show');
          });
      });
    </script>


  </body>

</html>