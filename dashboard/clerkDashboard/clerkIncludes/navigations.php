<?php $user =   $_SESSION['teacherfname']." ".$_SESSION['teacherMname']." ".$_SESSION['teacherLname']; ?>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	      
        <a class="navbar-brand" href="#"><span><img src="../../image/logo/logo.png" height="25"  style="" width="35"></span> New Christian Academy</a>
  
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="<?php echo  $user; ?>">
                    <a class="nav-link" href="clerkDashboard.php">
                        <i class="fa fa-fw fa fa-user-o"></i>
                        <span class="nav-link-text">
                        <?php echo  $user; ?>
                        </span>
                    </a>
                </li>
                
                  
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Students">
                    <a class="nav-link" href="manageStudent.php" >
                        <i class="fa fa-fw fa-address-card-o"></i>
                        <span class="nav-link-text">
                       Students
                        </span>
                    </a>
                </li>
                  
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Parents">
                    <a class="nav-link" href="manageParent.php" >
                        <i class="fa fa-fw fa-address-card-o"></i>
                        <span class="nav-link-text">
                        Parents
                        </span>
                    </a>
                </li>
                  
          
                
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Edit Profile">
                    
                </li>
                
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Faculty List">
                    <a class="nav-link" href="teacherList.php" >
                        <i class="fa fa-fw fa-address-card-o"></i>
                        <span class="nav-link-text">
                        Faculty List
                        </span>
                    </a>
                </li>
                
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Academics">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                      <i class="fa fa-fw fa-book"></i>
                      <span class="nav-link-text">
                        Academics</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                      <li>
                        <a class="nav-link" href="manageSubject.php" >
                        <i class="fa fa-fw fa-pencil-square-o "></i>
                        <span class="nav-link-text">
                        Subject
                        </span>
                           </a>
                      </li>
                      <li>
                         <a class="nav-link" href="manageClass.php" >
                        <i class="fa fa-fw fa-pencil-square-o "></i>
                        <span class="nav-link-text">
                        Class
                        </span>
                           </a>
                      </li>
                      <li>
                        <a class="nav-link" href="sySection.php" >
                        <i class="fa fa-fw fa-pencil-square-o "></i>
                        <span class="nav-link-text">
                        School Year and Section
                        </span>
                    </a>
                      </li>

                    </ul>
                 </li>
                 
               <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Building">
                    <a class="nav-link" href="roomsAndFloor.php" >
                        <i class="fa fa-fw fa-university"></i>
                        <span class="nav-link-text">
                       Building
                        </span>
                    </a>
                </li>
                -->
                
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Account Settings">
                    <a class="nav-link" href="setting.php" >
                        <i class="fa fa-fw fa-cog"></i>
                        <span class="nav-link-text">
                       Account Settings
                        </span>
                    </a>
                </li>
                
            </ul>
          

            
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                            
                    </a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>
                    Logout
                  </a>
                </li>
            </ul>
        </div>
    </nav>

