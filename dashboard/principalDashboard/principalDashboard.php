<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
      <?php 
   $sql         = $classes->selectAllQuery('student');
   $student     = $classes->selectAllCount($sql);
   $sql         = $classes->selectAllQuery('parent');
   $parentInfo  = $classes->selectAllCount($sql);
   $sql         = $classes->selectAllQuery('teacher');
   $teacherInfo = $classes->selectAllCount($sql);
   
   

   ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">

        </ol>

        
       
        <div class="row">

          <div class="col-xl-4 col-sm-4 mb-4">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-address-card"></i>
                </div>
                <div class="mr-5">
                  <?php echo $student ?> Student information
                </div>
              </div>
                <a href="student.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
            
            
          <div class="col-xl-4 col-sm-4 mb-4">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-address-card"></i>
                </div>
                <div class="mr-5">
                  <?php echo $parentInfo ?> Parent Information
                </div>
              </div>
                <a href="parents.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
           </div>
            
            
          <div class="col-xl-4 col-sm-4 mb-4">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-address-card"></i>
                </div>
                <div class="mr-5">
                  <?php echo $teacherInfo ?> Faculty members
                </div>
              </div>
              <a href="faculty.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
           </div>
              
              
          </div>
        </div>
		
			
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include_once('principalIncludes/footer.php'); ?>
    
