
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	      
        <a class="navbar-brand" href="#"><span><img src="../../image/logo/logo.png" height="25"  style="" width="35"></span> New Christian Academy</a>
  
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Student">
                    <a class="nav-link" href="#">
                        <i class="fa fa-fw fa fa-user-o"></i>
                        <span class="nav-link-text">
                        <?php echo  $_SESSION['studentFname']." ".$_SESSION['studentMname']." ".$_SESSION['studentLname']; ?>
                        </span>
                    </a>
                </li>
     

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Grades">
                    <a class="nav-link" href="mygrades.php" >
                        <i class="fa fa-fw fa-calendar "></i>
                        <span class="nav-link-text">
                       My Grades
                        </span>
                    </a>
                </li>
                
                 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Schedule">
                    <a class="nav-link" href="mySched.php" >
                        <i class="fa fa-fw fa-calendar "></i>
                        <span class="nav-link-text">
                       My Schedule
                        </span>
                    </a>
                </li>                  
                   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Account Settings">
                    <a class="nav-link" href="settings.php" >
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

