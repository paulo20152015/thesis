<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
   <?php 
   $sql         = $classes->selectAllQuery('student');
   $student     = $classes->selectAllCount($sql);
   $sql         = $classes->selectAllQuery('class');
   $classInfo   = $classes->selectAllCount($sql);
   $sql         = $classes->selectAllQuery('parent');
   $parentInfo  = $classes->selectAllCount($sql);
   $sql         = $classes->selectAllQuery('teacher');
   $teacherInfo = $classes->selectAllCount($sql);
   
   

   ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
                Clerk Dashboard
        </ol>
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-address-card"></i>
                </div>
                <div class="mr-5">
                  <?php echo $student ?> Student information
                </div>
              </div>
                <a href="manageStudent.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
            
            
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-address-card"></i>
                </div>
                <div class="mr-5">
                  <?php echo $parentInfo ?> Parent Information
                </div>
              </div>
                <a href="manageParent.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
           </div>
            
            
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-address-card"></i>
                </div>
                <div class="mr-5">
                  <?php
                  echo $teacherInfo ;?> Faculty members
                </div>
              </div>
              <a href="teacherList.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
           </div>
            
           <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-book"></i>
                </div>
                <div class="mr-5">
                  <?php echo $classInfo ?> Class Information
                </div>
              </div>
                <a href="manageClass.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
              
              
              
     
        
       

        </div>
		
			
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>
    
