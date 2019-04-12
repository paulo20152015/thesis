<?php include_once('teacherIncludes/header.php'); ?>
<?php include_once('teacherIncludes/navigations.php'); ?>
  <?php

  //for changing password
                    $row      = $classes->fetchUser($classes->checkExistQuery('accounts','teacherId'),$CurrenUserId);
                    $hash     =    $row['password'];
                    $row      = $classes->fetchUser($classes->checkExistQuery('teacher','teacherId'),$CurrenUserId);
                    $cnumber  =    $row['teacherContact'];
  
                    
      if(isset($_POST['studentId']) && isset($_POST['name']) && isset($_POST['lrn']) && isset($_POST['sessionId']) && isset($_POST['subject']) && isset($_POST['section']) 
              && isset($_POST['sy']) && isset($_POST['category']) && isset($_POST['grade'])){
        $_SESSION['studentId']   = $_POST['studentId'];
        $_SESSION['name']        = $_POST['name'];
        $_SESSION['lrn']         = $_POST['lrn'];
        $_SESSION['sessionId']   = $_POST['sessionId'];
        $_SESSION['subject']     = $_POST['subject'];
        $_SESSION['section']     = $_POST['section'];
        $_SESSION['sy']          = $_POST['sy'];
        $_SESSION['category']    = $_POST['category'];
        $_SESSION['grade']       = $_POST['grade'];
    
        $studentId   = $_SESSION['studentId'];
        $name        = $_SESSION['name'];
        $lrn         = $_SESSION['lrn'];
        $sessionId   = $_SESSION['sessionId'];
        $subject     = $_SESSION['subject'];
        $section     = $_SESSION['section'];
        $sy          = $_SESSION['sy'];
        $category    = $_SESSION['category'];
        $grade       = $_SESSION['grade'];
    }
    else
        {
        $studentId   = $_SESSION['studentId'];
        $name        = $_SESSION['name'];
        $lrn         = $_SESSION['lrn'];
        $sessionId   = $_SESSION['sessionId'];
        $subject     = $_SESSION['subject'];
        $section     = $_SESSION['section'];
        $sy          = $_SESSION['sy'];
        $category    = $_SESSION['category'];
        $grade       = $_SESSION['grade'];

        }
  ?>
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          LRN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $lrn;?><br>
          Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $name;?><br>
          Subject  &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $subject;?><br>
          Section  &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $section;?><br>
          Grade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : <?php echo $grade;?><br>
          S.Y  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : <?php echo $sy;?><br>
          Category &nbsp;: <?php echo $category;?><br>
       </ol>
        
      <div class="row">
       
     <div class="col-lg-4 col-md-4 col-sm-4 ">
          <div class="card mb-3 bg-default">
              <div class="card-header">
                <i class="fa "></i>
                Student Grade Form
              </div>
              <div class="card-body ">
                  <form method="post" id="gradesForm">
                      <div class="form-group">
                      <label>Grade : </label>
                      <input type="number" placeholder="Student Grade" name="grade" id="grade" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Category : </label>
                      <select name="gradeCategory" class="form-control" required>
                          <option value=""></option>
                          <?php if($category == 'Summer' ){ ?>
                          <option value="1" >summer</option>
                          <?php }?>
                         <?php if($category == 'Regular'){ ?>
                          <option value="2">First Quarter</option>
                          <option value="3">Second Quarter</option>
                          <option value="4">Third Quarter</option>
                          <option value="5">Fourth Quarter</option>
                          <?php }?>
                          <?php if($category == '1st Semester' || $category == '2nd Semester'){ ?>
                          <option value="6">Mid Term</option>
                          <option value="7">Final Term</option>
                          <?php }?>
                      </select>
                      </div>
                            <input type='hidden' name='sessionId' value='<?php echo $sessionId;?>'>
                            <input type='hidden' name='studentId' value='<?php echo $studentId;?>'>
                            <?php echo     $formClass->triggerField('inputGrade'); ?>
                   <button class=" nav-link  btn btn-primary form-control" id="gradesBtn"><i class="fa fa-plus fa-lg"></i> ADD</button>
                  </form>   
              </div>
              <div class="card-footer small text-muted" id="gradeMes">

              </div>
            </div>
         </div>
          
          
          <!-- students table -->
          <div class="col-lg-8">
            <?php
            $sql       = $classes->selectTwoFilterQuery('grade','sessionId','studentId');
            $count     = $classes->selectTwoReturn($sql,$sessionId,$studentId);
            echo $formClass->tableHeader('Students',''); 
            $sql       = $classes->selectTwoFilterRowQuery('grade','gradeCategory','sessionId','studentId');
            $smt       = $classes->selectTwoFilterRow($sql,$sessionId,$studentId);
            ?>
                      <thead>
                        <tr>
                            <?php 
                            for($i=1;$i<=$count;$i++){
                                while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                                   $gradeCat = $row['gradeCategory'];
                                   if($gradeCat == 1){
                                       $gradeCat ='Summer';
                                   }
                                    if($gradeCat == 2){
                                       $gradeCat ='First Quarter';
                                   }
                                    if($gradeCat == 3){
                                       $gradeCat ='Second Quarter';
                                   }
                                    if($gradeCat == 4){
                                       $gradeCat ='Third Quarter';
                                   }
                                    if($gradeCat == 5){
                                       $gradeCat ='Fourth Quarter';
                                   }
                                    if($gradeCat == 6){
                                       $gradeCat ='Mid Term';
                                   }
                                    if($gradeCat == 7){
                                       $gradeCat ='Final Term';
                                   }
                            ?>
                            
                            <th><?php echo $gradeCat; ?></th>
                            <?php 
                                }
                            }
                            ?>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <?php 
                    $sql       = $classes->selectTwoFilterRowQuery('grade','gradeCategory','sessionId','studentId');
                    $smt       = $classes->selectTwoFilterRow($sql,$sessionId,$studentId);
                            for($i=1;$i<=$count;$i++){
                                while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                                   $grade    = $row['grade'];
                                   $gradeCat = $row['gradeCategory'];
                                   $remarks  = $row['remarks'];
                            ?>
                            <form method="post" id="gradeForm<?php echo $gradeCat;?>">
                                <?php echo     $formClass->triggerField('editGrade'); ?>
                            <input type='hidden' name='sessionId' value='<?php echo $sessionId;?>'>
                            <input type='hidden' name='studentId' value='<?php echo $studentId;?>'>
                            <input type='hidden' name='gradeCat'  value='<?php echo $gradeCat;?>'>
                            <td class="<?php if($remarks =='passed'){echo 'bg-success';}else{echo 'bg-danger';}?>">
                                <input value="<?php echo $grade; ?>" name="grade" id="grade<?php echo $gradeCat;?>" class="form-control"></td>
                            </form>
                            <?php 
                                }
                            }
                            ?>                       



                        </tr>
                      </tbody>
                            </table>
                       </div>
                     </div>
                    <div class='card-footer small text-muted' id="gradeUpdateMes">
                   </div>
                  </div>
                </div>
            </div>
      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('teacherIncludes/footer.php'); ?>


    