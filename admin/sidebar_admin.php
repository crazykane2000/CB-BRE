<div class="o-page__sidebar js-page-sidebar">
        <aside class="c-sidebar" style="background-color: #fff;">
          <div class="c-sidebar__brand">
            <a href="#"><img src="../img/carre.png" style="width: 90%;" alt="Iotied"></a>
          </div>

          <!-- Scrollable -->
          <div class="c-sidebar__body">
            <ul class="c-sidebar__list">
              <li>
                <a class="c-sidebar__link" href="dashboard.php">
                  <i class="c-sidebar__icon feather icon-home"></i>Dashboard
                </a>
              </li>              
            </ul>

            <span class="c-sidebar__title">Members</span>
            <ul class="c-sidebar__list">
              <li>
                <a class="c-sidebar__link" href="view_vendor.php?type=Pharmacy">
                  <i class="c-sidebar__icon feather icon-user"></i>Pharmacy
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="view_producers.php">
                  <i class="c-sidebar__icon feather icon-user"></i>Producers
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="view_vendor.php?type=Hospital">
                  <i class="c-sidebar__icon feather icon-users"></i>Hospitals
                </a>
              </li>
             <li>
                <a class="c-sidebar__link" href="view_vendor.php?type=Insuarance Company">
                  <i class="c-sidebar__icon feather icon-users"></i>Insuarance Company
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="view_vendor.php?type=Laboratory">
                  <i class="c-sidebar__icon feather icon-users"></i>Laboratory
                </a>
              </li>
             
            </ul>

            <span class="c-sidebar__title">Iotied</span>
            <ul class="c-sidebar__list">
              <li>
                <a class="c-sidebar__link" href="view_plans.php">
                  <i class="c-sidebar__icon feather icon-layers"></i>Plans
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="buy_requests.php">
                  <i class="c-sidebar__icon feather icon-book"></i>Buy requests
                </a>
              </li>
            </ul>

            <span class="c-sidebar__title">Meta Data </span>
            <ul class="c-sidebar__list">
              <li>
                <a class="c-sidebar__link" href="transactions.php">
                  <i class="c-sidebar__icon feather icon-layers"></i>Blockchain Transactions
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="view_support.php">
                  <i class="c-sidebar__icon feather icon-layers"></i>Support
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="view_kyc.php">
                  <?php $cou = get_count_items("kyc", "status", "Pending");
                    if ($cou>0) {
                      $cou = '<span style="padding:5px;background-color:red;color:#fff;border-radius:4px">'.$cou.'</span>';
                    }
                    else{
                      $cou = "";
                    }
                   ?>
                  <i class="c-sidebar__icon feather icon-book"></i>KYC Requests <?php echo $cou;  ?>
                </a>
              </li>

              <li>
                <a class="c-sidebar__link" href="patient_data_access.php">
                  <?php $cou = get_count_items("request_access", "status", "Pending");
                    if ($cou>0) {
                      $cou = '<span style="padding:5px;background-color:red;color:#fff;border-radius:4px">'.$cou.'</span>';
                    }
                    else{
                      $cou = "";
                    }
                   ?>
                  <i class="c-sidebar__icon feather icon-book"></i>Data Access Request<?php echo $cou;  ?>
                </a>
              </li>
             
            </ul>

          </div>
         

          <a class="c-sidebar__footer" href="logout.php">
            Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
          </a>
        </aside>
      </div>