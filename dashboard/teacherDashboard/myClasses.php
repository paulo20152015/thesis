<?php include_once('teacherIncludes/header.php'); ?>
<?php include_once('teacherIncludes/navigations.php'); ?>
  <?php
  //for changing password
                    $row      = $classes->fetchUser($classes->checkExistQuery('accounts','teacherId'),$CurrenUserId);
                    $hash     =    $row['password'];
                    $row      = $classes->fetchUser($classes->checkExistQuery('teacher','teacherId'),$CurrenUserId);
                    $cnumber  =    $row['teacherContact'];
  
  
  ?>
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
   Classes Registered to you
      </ol>
        
      <div class="row">
<?php 
    $sql = $classes->getTeacherClassQueryStat();
    $smt = $classes->selectAllQueryAscWithAcitve($sql,$CurrenUserId);
    while($row = $smt->fetch(PDO::FETCH_ASSOC)){
       
        $section   = $row['sectionName'];
        $grade     = $row['gradeLevel'];
        $cat       = $row['categoryName'];
        $sy        = $row['sy'];
        $catId     = $row['categoryId'];
        $classId   = $row['classId'];
        $teacherId = $row['teacherId'];
        
?>
     <div class="col-lg-3 col-md-4 col-sm-4 ">
          <div class="card mb-3 bg-default">
              <div class="card-header">
                <i class="fa fa-book fa-lg "></i><br>
                Section : <?php echo $section;?><br>
                Grade   : <?php echo $grade;?><br>
              </div>
              <div class="card-body text-center">
                 <?php echo $sy;?><br>
                 <?php echo $cat;?><br>             
              </div>
              <div class="card-footer small text-muted">
                 <form action="studentClass.php" method="post">
                     
                     <input type="hidden" name="classId"          value="<?php echo $classId;?>">
                     <input type="hidden" name="catId"            value="<?php echo $catId;?>">
                     <input type="hidden" name="categoryName"     value="<?php echo $cat;?>">
                     <input type="hidden" name="sy"               value="<?php echo $sy;?>">
                    <button class=" nav-link  btn btn-primary form-control"><i class="fa fa-user-circle fa-lg"></i> Students</button>
                 </form>
              </div>
            </div>
         </div>
  <?php
    }
  ?>

      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('teacherIncludes/footer.php'); ?>


    