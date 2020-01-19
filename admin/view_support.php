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
    <title>View Support  | cAREER Builder</title>
    <meta name="description" content="cAREER Builder">
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
         <h4>View Support Query Here </h4>
         <br/>
           <div class="c-table-responsive@wide">
            <div style="padding: 1px;background-color: #fff;min-height: 700px">
              <table class="c-table">
              <thead class="c-table__head">
                <tr class="c-table__row">
                  <th class="c-table__cell c-table__cell--head">S.No</th>
                  <th class="c-table__cell c-table__cell--head">Query</th>
                  <th class="c-table__cell c-table__cell--head">Status</th>
                  <th class="c-table__cell c-table__cell--head">Date</th>
                  <th class="c-table__cell c-table__cell--head">Resolve</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  try {
                        $stmt = $pdo->prepare('SELECT * FROM `support`  ORDER BY date DESC');
                    } catch(PDOException $ex) {
                        echo "An Error occured!";
                        print_r($ex->getMessage());
                    }
                    $stmt->execute();
                    $user = $stmt->fetchAll();  
                    $i=1;
                   
                    foreach($user as $key=>$value){

                    $btn = '<button class="c-btn tyu c-btn--small  c-btn--danger" data-toggle="modal" data-id="'.$value['id'].'" data-target=".c-modal" data-subject="'.$value['subject'].'">Resolve</button>';
                    $status = '<span class="c-badge c-badge--danger c-badge--small " >Pending</span>';
                    if ($value['status']!="Pending") {
                      $status = '<span class="c-badge c-badge--success c-badge--small " >Resolved</span>';
                      $btn = '<button class="c-btn  c-btn--small c-btn--success">Resolved</button>';
                    }

                    $ans = "";
                    if ($value['answer']!="") {
                      $ans = "<b style='color:green';'>Ans : </b>".$value['answer'];
                    }

                      echo '<tr class="c-table__row">
                            <td class="c-table__cell">'.$i.'</td>
                            <td class="c-table__cell"><b style="color:#333;">'.$value['subject'].'</b><br/>'.$value['query'].'<br/>
                              '.$ans.'
                            </td>
                            <td class="c-table__cell">'.$status.'</td>
                            <td class="c-table__cell">'.$value['date'].'</td>
                            <td class="c-table__cell">'.$btn.'</td>
                            <td></td>
                          </tr>';
                        $i++;
                  }          
                ?>    
               
                <div class="c-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="modal1" style="display: none;" aria-hidden="true">
                    <div class="c-modal__dialog modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="support_handle_data.php" method="POST">
                              <div class="c-card u-p-medium u-mh-auto" style="max-width:500px;">
                                  <h3>Resolve Query</h3>
                                  <hr style="margin:14px 0px;opacity: .3">
                                  <div id="poik"></div>

                                  <input type="hidden" name="id" id="vgy"><br/>
                                 
                                  <textarea class="c-input" name="answer" placeholder="Enter Your Answer"></textarea>
                                  <br/>
                                  <select class="c-input" name="status">
                                    <option>Resolved</option>
                                    <option>Pending</option>
                                  </select>
                                  <hr style="margin:14px 0px;opacity: .3">

                                  <button class="c-btn c-btn--info" type="submit">
                                      Resolve This Query
                                  </button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>

               
              </tbody>
            </table>
            </div>
          </div>

          <div style="padding: 20px;"></div>
            <?php include '../footer.php'; ?>          
        </div>
      </main>
    </div>
    <script src="../js/neat.minc619.js?v=1.0"></script>  
    <script type="text/javascript">
      $(document).ready(function () {
          $(".tyu").click(function () {
              $("#poik").html($(this).data('subject'));
              $("#vgy").val($(this).data('id'));
              $('.c-modal').modal('show');
          });
      });
    </script>
  </body>

</html>
