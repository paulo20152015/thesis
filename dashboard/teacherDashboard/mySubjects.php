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
 
      </ol>
        
      <div class="row">

<?php 
    $sql = $classes->getTeacherSubjects();
    $smt = $classes->selectTwoFilter($sql,1,$CurrenUserId);
    while($row = $smt->fetch(PDO::FETCH_ASSOC)){
        $subject   = $row['subjectName'];
        $section   = $row['sectionName'];
        $grade     = $row['gradeLevel'];
        $cat       = $row['categoryName'];
        $sy        = $row['sy'];
        $sesId     = $row['sessionId'];
        $classId   = $row['classId'];
        $teacherId = $row['teacherId'];
        
?>
     <div class="col-lg-3 col-md-4 col-sm-4 ">
          <div class="card mb-3 bg-default">
              <div class="card-header">
                <i class="fa fa-book fa-lg "></i><br>
                Subject : <?php echo $subject;?><br>
                Section : <?php echo $section;?><br>
                Grade   : <?php echo $grade;?><br>
              </div>
              <div class="card-body text-center">
                 <?php echo $sy;?><br>
                 <?php echo $cat;?><br>             
              </div>
              <div class="card-footer small text-muted">
                 <form action="subjectStudents.php" method="post">
                     <input type="hidden" name="sessionId"        value="<?php echo $sesId;?>">
                     <input type="hidden" name="classId"          value="<?php echo $classId;?>">
                     <input type="hidden" name="subjectName"      value="<?php echo $subject;?>">
                     <input type="hidden" name="sectionName"      value="<?php echo $section;?>">
                     <input type="hidden" name="gradeLevel"       value="<?php echo $grade;?>">
                     <input type="hidden" name="categoryName"     value="<?php echo $cat;?>">
                     <input type="hidden" name="sy"               value="<?php echo $sy;?>">
                     <input type="hidden" name="teacherId"        value="<?php echo $teacherId;?>">
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


    