<div class="row" >
            <div class="col-md-4">
              <a href="view_vendor.php?type=Pharmacy">
                <div class="c-state-card c-state-card--info">
                  <h4 class="c-state-card__title">Total Pharmacy</h4>
                  <span class="c-state-card__number"><?php echo $count = get_count_items("users", "type", "Pharmacy"); ?></span>
                </div>
              </a>
            </div>

            <div class="col-md-4">
              <a href="view_vendor.php?type=Hospital">
                <div class="c-state-card c-state-card--success">
                <h4 class="c-state-card__title">Total Hospitals</h4>
                <span class="c-state-card__number"><?php echo $count = get_count_items("users", "type", "Hospital"); ?></span>
              </div>
            </a>
            </div>

            <div class="col-md-4">
              <a href="view_producers.php">
                <div class="c-state-card c-state-card--info">
                <h4 class="c-state-card__title">Total Producers</h4>
                <span class="c-state-card__number"><?php $balance =  get_patients(); 
                      $balance = json_decode($balance,true);
                      $balance = count($balance);
                      echo $balance;
                ?></span>
              </div>
              </a>
            </div>

            <div class="col-md-4">
              <a href="view_vendor.php?type=Laboratory">
              <div class="c-state-card c-state-card--info">
                <h4 class="c-state-card__title">Total Laboratory</h4>
                <span class="c-state-card__number"><?php echo $count = get_count_items("users", "type", "Laboratory"); ?></span>
              </div>
            </a>
            </div>

             <div class="col-md-4">
              <a href="view_vendor.php?type=Insuarance Company">
                <div class="c-state-card c-state-card--info">
                <h4 class="c-state-card__title">Total Insuarance Company</h4>
                <span class="c-state-card__number"><?php echo $count = get_count_items("users", "type", "Insuarance Company"); ?></span>
              </div>
            </a>
            </div>

           

             <div class="col-md-4">
              <a href="view_support.php"><div class="c-state-card c-state-card--info">
                <h4 class="c-state-card__title">Total Support</h4>
                <span class="c-state-card__number"><?php echo $count = count_tem_in_table("support"); ?></span>
              </div></a>
            </div>
            
            <div class="col-md-4">
              <a href="buy_requests.php">
                <div class="c-state-card c-state-card--info">
                  <h4 class="c-state-card__title">Tokens Bought</h4>
                  <span class="c-state-card__number">$45,000</span>
                </div>
              </a>
            </div>
            
             <div class="col-md-4">
              <a href="view_plans.php">
                <div class="c-state-card c-state-card--info">
                  <h4 class="c-state-card__title">Total Plans</h4>
                  <span class="c-state-card__number"><?php echo $count = count_tem_in_table("plan"); ?></span>
                </div>
                </a>
            </div>

            <div class="col-md-4">
              <a href="view_kyc.php">
                <div class="c-state-card c-state-card--info">
                  <h4 class="c-state-card__title">Total Pending KYC</h4>
                  <span class="c-state-card__number"><?php echo $count = get_count_items("kyc", "status", "Pending"); ?></span>
                </div>
              </a>
            </div>
            
          </div>

