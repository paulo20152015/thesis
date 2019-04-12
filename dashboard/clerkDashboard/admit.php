<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
<?php 
    if(isset($_POST['studentId']) && isset($_POST['name']) && isset($_POST['lrn']) && isset($_POST['level']) && isset($_POST['gender']) )
            {
        $_SESSION['studentId'] = $_POST['studentId'];
        $_SESSION['name']      = $_POST['name'];
        $_SESSION['lrn']       = $_POST['lrn'];
        $_SESSION['level']     = $_POST['level'];
        $_SESSION['gender']    = $_POST['gender'];
        $studId                = $_SESSION['studentId'];
        $name                  = $_SESSION['name'];
        $lrn                   = $_SESSION['lrn'];
        $level                 = $_SESSION['level'];
        $gender                = $_SESSION['gender'];
    }
    else
        {
        $studId                = $_SESSION['studentId'];
        $name                  = $_SESSION['name'];
        $lrn                   = $_SESSION['lrn'];
        $level                 = $_SESSION['level'];
        $gender                = $_SESSION['gender'];

        }
           //admit student
 
     if(isset($_POST['admit'])){
         if(!empty($_POST['classId']) && !empty($_POST['studId']) && !empty($_POST['glId']) &&
                 !empty($_POST['syId']) && !empty($_POST['catId']) && !empty($_POST['stuName'])){
              $classId     = $_POST['classId'];
              $studentId   = $_POST['studId'];
              $glId        = $_POST['glId'];
              $catId       = $_POST['catId'];
              $syId        = $_POST['syId'];
              $stuName     = $_POST['stuName'];
              $sql2  = $classes->limitAdmitQuery();
              $count = $classes->checkFourFilter($sql2,$syId,$glId,$catId,$studentId);
             
              if($count == 0){
              $sql       = $classes->insertTwoQuery('studentclass','studentId','classId');
              $result    = $classes->insertTwoReturn($sql,$studentId,$classId);
              if($result == true){
                  $sql     = $classes->getClassInfoQuery();
                  $row     = $classes->fetchUser($sql,$classId);
                  $tFname  = $row['teacherFname'];
                  $tMname  = $row['teacherMname'];
                  $tLname  = $row['teacherLname'];
                  $teacher = $tLname." ".$tFname." ".$tMname;
                  $section = $row['sectionName'];
                  $sy      = $row['sy'];
                  $success = 1;
                  $name    = $_POST['stuName'];
                  $admitMes =  '<div class="alert alert-default" role="alert">';
                  $admitMes .=  $name." has been admitted <br>"
                          ."Class Adviser: ".$teacher."<br>"
                          . "Section : ".$section."<br>"
                          . "School Year : ".$sy."<br>"
                          . "<table class='table table table-bordered' width='100%' cellspacing='0'>"
                          . "<tr>"
                            ."<th>Subject</th>"
                            ."<th>teacher</th>"
                          ."</tr>";
                         if(isset($success)){
                            $sql = $classes->getClassSessionQuery();
                            $res = $classes->selecStudentParent($sql,$classId); 
                             while($row = $res->fetch(PDO::FETCH_ASSOC) ){
                                  $fname  = $row['teacherFname'];
                                  $mname  = $row['teacherMname'];
                                  $lname  = $row['teacherLname'];
                                  $t = $lname." ".$fname." ".$mname;
                                  $subject  = $row['subjectName'];
                               $admitMes .= "<tr>";
                               $admitMes .= "<td>".$subject."</td>";
                               $admitMes .= "<td>".$t."</td>";
                               $admitMes .= "</tr>";
                             } 
                               $admitMes .= "</table>";
                               $admitMes .= "</div>";
                           }                  
              }else{
                   $admitMes =  '<div class="alert alert-danger" role="alert">'
                    .'<strong>Admission Error:<br> Request Error or Student is<br> already Admitted to this class</strong>'
                    .'</div>';
              }
           }else{
                    $admitMes =  '<div class="alert alert-danger" role="alert">'
                    .'<strong>Student is admitted</strong>'
                    .'</div>';
            }
         }else{
                    $admitMes =  '<div class="alert alert-danger" role="alert">'
                    .'<strong>Admission Fail:<br></strong>'
                    .'</div>';
         }
     }
?>   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <br><strong>Student Information</strong> :<br>
          LRN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $lrn; ?><br>
          Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $name; ?><br>
          Grade Level &nbsp;&nbsp;: <?php echo $level; ?><br>
          Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $gender; ?><br>
      </ol>
        
      <div class="row">
          
          <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-id-badge"></i>
                  Class Admission
                </div>
                <div class="card-body">

                        <?php 
                               $sql = $classes->getClassQuery();
                               $smt = $classes->selecStudentParent($sql,$level);

                               while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                                $level   =  $row['gradeLevel'];
                                $section =  $row['sectionName'];
                                $sy      =  $row['sy'];
                                $id      =  $row['classId'];
                                $syId    =  $row['syId'];
                                $glId    =  $row['gradeLevelId'];
                                $catId   =  $row['categoryId'];
                                if($catId == 1){
                                    $cat = '1st Semester';
                                }
                                if($catId == 2){
                                    $cat = '2nd Semester';
                                }
                                if($catId == 3){
                                    $cat = 'Summer';
                                }
                                if($catId == 4){
                                    $cat = 'Regular';
                                }
                                if($catId == 5){
                                    $cat = 'Summer';
                                }
                                $select  = $level." ".$section." ".$sy." ".$cat;
                                   ?> 
                      <form method="post" action="admit.php">
                          <input type="hidden" name="classId" value="<?php echo $id;?>">
                          <input type="hidden" name="syId" value="<?php echo $syId;?>">
                          <input type="hidden" name="glId" value="<?php echo $glId;?>">
                          <input type="hidden" name="catId" value="<?php echo $catId;?>">
                          <input type="hidden" name="studId" value="<?php echo $studId;?>">
                          <input type="hidden" name="stuName" value="<?php echo $name;?>">
                          <?php echo $formClass->triggerField('admit');?>
                          <div class="form-group">
                          <button class="btn btn-success form-control" onclick="return confirm('Are you sure?');" id=""><?php echo $select; ?> <i class="fa fa-hand-pointer-o"></i> Admit</button> 
                          </div>
                      </form>                    
                               <?php }?>
                </div>
                <div class="card-footer small text-muted">
                      
                </div>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-id-badge"></i>
                  Admission Info : 
                </div>
                <div class="card-body" id="admitMes">
                    <?php  if(!empty($admitMes)){
                        echo $admitMes;
                    }?>
                </div>
                <div class="card-footer small text-muted">

                </div>
              </div>
          </div>
          
      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>

  
 
 
     


                        


 


    