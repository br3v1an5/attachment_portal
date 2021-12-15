<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/color-settings.html">
            <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="/" class="dropdown-toggle no-arrow">
                        <span class="mtext"> <i class="fa fa-home" aria-hidden="true"></i> Home</span>
                    </a>
                </li>
                <?php if ($_SESSION['is_admin'] != 1) {  ?>
                    <li>
                        <a href="/attachment-apply.php" class="dropdown-toggle no-arrow">
                            <span class="mtext"> <i class="fa fa-map-pin" aria-hidden="true"></i> Attachment</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['is_admin'] == 1) {  ?>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-right-arrow1"></span><span class="mtext">Supervisors</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/supervisor_create.php">New Supervisor</a></li>
                            <li><a href="/registered_supervisors.php">Manage Supervisors</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/attachments-sent.php" class="dropdown-toggle no-arrow">
                            <span class="mtext"> <i class="fa fa-inbox" aria-hidden="true"></i> Received </span>
                        </a>
                    </li>

                    <li>
                        <a href="/graphs.php" class="dropdown-toggle no-arrow">
                            <span class="mtext"> <i class="fa fa-map-pin" aria-hidden="true"></i> Graphs </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>