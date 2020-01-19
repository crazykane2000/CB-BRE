<header class="c-navbar u-mb-medium">
          <button class="c-sidebar-toggle js-sidebar-toggle">
            <i class="feather icon-align-left"></i>
          </button>

          <h2 class="c-navbar__title">Admin Dashboard</h2>

          <div class="c-dropdown dropdown u-mr-small">
            <div class="c-notification dropdown-toggle" id="dropdownMenuToggle1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
              <i class="c-notification__icon feather icon-message-circle"></i>
            </div>

            <div class="c-dropdown__menu c-dropdown__menu--large has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuToggle1">

              <span class="c-dropdown__menu-header">
                Mentions
              </span>

              
              

              <a class="c-dropdown__item dropdown-item" href="#">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <span class="c-avatar c-avatar--xsmall">
                      <img class="c-avatar__img" src="../img/download.jpg" alt="Adam Sandler">
                    </span>
                  </div>

                  <div class="o-media__body">
                    <p>Hey, Julia how are you doing. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eius iste.</p>
                  </div>
                </div>
              </a>

              <a class="c-dropdown__item dropdown-item" href="#">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <span class="c-avatar c-avatar--xsmall">
                      <img class="c-avatar__img" src="../img/download.jpg" alt="Adam Sandler">
                    </span>
                  </div>

                  <div class="o-media__body">
                    <p>Hey, Julia how are you doing. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eius iste.</p>
                  </div>
                </div>
              </a>

              <a class="c-dropdown__menu-footer">
                All Mentions
              </a>
            </div>
          </div>

          <div class="c-dropdown dropdown u-mr-medium">
            <div class="c-notification has-indicator dropdown-toggle" id="dropdownMenuToggle2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
              <i class="c-notification__icon feather icon-bell"></i>
            </div>

            <div class="c-dropdown__menu c-dropdown__menu--large has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuToggle2">

              <span class="c-dropdown__menu-header">
                Notifications
              </span>
              <?php $data = get_data_id_data_alll("notification", 8);
                foreach ($data as $key => $value) {
                  echo '<a class="c-dropdown__item dropdown-item" href="notification.php" target="_blank">
                          <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                              <span class="c-icon c-icon--info c-icon--xsmall"><i class="feather icon-globe"></i></span>
                            </div>
                            <div class="o-media__body">
                              <p>'.$value['notification'].'</p>
                            </div>
                          </div>
                        </a>';
                }
               ?>             
              <a class="c-dropdown__menu-footer" href="notification.php" target="_blank">
                All Notifications
              </a>
            </div>
          </div>

          <div class="c-dropdown dropdown">
            <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
              <img class="c-avatar__img" src="../img/download.jpg" alt="Adam Sandler">
            </div>

            <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAvatar">
              <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
              <a class="c-dropdown__item dropdown-item" href="#">View Activity</a>
              <a class="c-dropdown__item dropdown-item" href="#">Log out</a>
            </div>
          </div>
        </header>