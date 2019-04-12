<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
<?php 
    if(isset($_POST['classId'])){
        $_SESSION['classId'] = $_POST['classId'];
        $cId   = $_SESSION['classId'];
        $sql   = $classes->getClassInfoQuery();
        $class = $classes->fetchUser($sql,$cId);
        $sy    = $class['sy'];
        $active= $class['active'];
        $tFname= $class['teacherFname'];
        $tMname= $class['teacherMname'];
        $tLname= $class['teacherLname'];
        $gLevel= $class['gradeLevel'];
        $level= $class['level'];
        $sec   = $class['sectionName'];

    }
    else
        {
        $cId   = $_SESSION['classId'];
        $sql   = $classes->getClassInfoQuery();
        $class = $classes->fetchUser($sql,$cId);
        $sy    = $class['sy'];
        $active= $class['active'];
        $tFname= $class['teacherFname'];
        $tMname= $class['teacherMname'];
        $tLname= $class['teacherLname'];
        $gLevel= $class['gradeLevel'];
        $level = $class['level'];
        $sec   = $class['sectionName'];
        }
   if(isset($_POST['addClassSubject'])){
       if(!empty($_POST['subject']) && !empty($_POST['teacher']) && !empty($_POST['id'])){
               $id       = $_POST['id'];
               $subject  = $_POST['subject'];
               $teacher  = $_POST['teacher'];
               $sql      = $classes->selectTwoFilterQuery('session','subjectId','classId');  
               $count      = $classes->selectTwoReturn($sql,$subject,$id);    
               
               if($count == 0 ){
                  $sql    = $classes->insertThreeQuery('session','classId','subjectId','teacherId');
                  $result = $classes->insertThreeReturn($sql,$id,$subject,$teacher);
                    if($result == true){
                        $classMes = "Added Successfully";
                    }else{
                        $classMes = "Submission Fail";
                    }
               }else{
                   $classMes = 'Class subject already exist';
               }
       }else{
           $classMes = 'No empty fields';
       }
   }
?>   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <br><strong>Class Information</strong> :<br>
          School Year&nbsp;&nbsp;&nbsp;: <?php echo $sy; ?><br>
          Class Adviser : <?php echo $tLname." ".$tFname." ".$tMname; ?><br>
          Grade Level   &nbsp;&nbsp;: <?php echo $gLevel; ?><br>
          Section &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $sec; ?><br>

      </ol>
        
      <div class="row">
          
            <!-- Example Bar Chart Card -->
             
         <div class="col-lg-6">
             <?php if(isset($active)){ 
                 if($active == 1){
                 ?>
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa "></i>
                 Class Subject Form
              </div>
              <div class="card-body">
                 
                    <form method="post" action="class.php">
                        
                        <div class='form-group'>
                           <label class='control-label'>Teacher: </label>	
                             <select name='teacher' id='teacher' class='form-control' required>
                                 <option value="">Select</option>
                               <?php
                        $sql = $classes->selectAllQueryAscWithAcitveQuery2();
                        $smt = $classes->selectAll($sql);
                               while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                               ?>
                                <option value="<?php echo $row['teacherId']; ?>"><?php echo $row['teacherLname']." ".$row['teacherFname']." ".$row['teacherMname']; ?></option>
                                <?php 
                               }
                                ?>
                             </select>
                              <span class='help-block'></span>
                         </div>
                         <?php 
                         //condtion if grade 7-10 or grade 11-12
                         if($level == 1){
                         ?>
                         <div class='form-group'>
                           <label class='control-label'>Subject : </label>	
                           <select name='subject' id='subject' class='form-control' required>
                             <option value="">Select</option>
                            <?php
                            $sql = $classes->checkExistQuery('subjects','subjectCode');
                            $smt = $classes->selectAllFilter($sql,'LOWER');
                            while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                             <option value="<?php echo $row['subjectId']; ?>"><?php echo $row['subjectName']; ?></option>
                             <?php 
                            }
                             ?>
                          </select>
                           <span class='help-block'></span>
                         </div>                      
                        
                         <?php
                         }
                         else
                         {
                         ?>
                         <div class='form-group'>
                           <label class='control-label'>Subject : </label>	
                           <select name='subject' id='subject' class='form-control'>
                               <option value="" required>Select</option>
                            <?php
                            $sql = $classes->notFetchSubjectQuery();
                            $smt = $classes->fetchSubject($sql,'LOWER');           
                            while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                             <option value="<?php echo $row['subjectId']; ?>"><?php echo $row['subjectName']." | Code :".$row['subjectCode']." |"; ?></option>
                             <?php 
                            }
                             ?>
                          </select>
                              <span class='help-block'></span>
                         </div>                       
                        
                         <?php 
                         }
                         // end condtion if grade 7-10 or grade 11-12
                         ?>
                        
                         <input type="hidden" name="id" value="<?php echo $cId;?>">
                         
                         <?php echo $formClass->triggerField('addClassSubject');?>
                         <button class="btn btn-success form-control"><i class="fa fa-plus-square fa-lg"></i> Subject</button>
                    </form>
               
              </div>
              <div class="card-footer small text-muted">
               <?php if(!empty($classMes)){
                     echo $classMes;
                 }?>
              </div>
            </div>
             <?php }
                   }
                   ?>
             
             <div class="card mb-3">
                <div class="card-header">
                  <i class="fa "></i>
                  Class Session: 
                </div>
                <div class="card-body">
                   <table class='table table-bordered' width='100%' cellspacing='0'>
                          <thead>
                          <tr>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $classes->getSessionQuery();
                            $result = $classes->selecStudentParent($sql,$cId);
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                $id       =   $row['sessionId'];
                                $lname    =   $row['teacherLname'];
                                $fname    =   $row['teacherFname'];
                                $mname    =   $row['teacherMname'];
                                $tid      =   $row['teacherId'];
                                $subject  =   $row['subjectName'];
                                ?>
                           <tr>
                            <td><?php echo $subject; ?></td>
                            <td><?php echo $lname." ".$fname." ".$mname; ?></td>
            
                            <td>
                                <div class="btn-group">
                                    
                                 <button class="btn btn-primary" data-toggle="modal" data-target="#uc<?php echo $id ;?>">
                                    <i class="fa fa-fw fa fa-pencil-square-o"> </i> </button> 
                                    
                                <form method='post' action='schedule.php'>
                                  <input type='hidden' name='sesId' value='<?php echo $id;?>'>
                                  <input type='hidden' name='section' value='<?php echo $sec;?>'>
                                  <input type='hidden' name='sy' value='<?php echo $sy;?>'>
                                  <input type='hidden' name='subject' value='<?php echo $subject;?>'>
                                  <input type='hidden' name='level' value='<?php echo $gLevel;?>'>
                                  <input type='hidden' name='active' value='<?php echo $active;?>'>
                                  <input type='hidden' name='teacher' value='<?php echo $lname." ".$fname." ".$mname;?>'>
                                 
                                  <button type='submit' class='btn btn-primary' title='Assign Schedule'><i class='fa fa-fw fa-plus-square   '></i> Schedule</button>
                                </form>
                                    
                                <form method='post' action='message.php'>
                                  <input type='hidden' name='sesId' value='<?php echo $id;?>'>
                                 <?php echo     $formClass->triggerField('deleteClassSession'); ?>
                                  <button type='submit' class='btn btn-danger' onclick="return confirm('Are you sure?');" title='Remove'><i class='fa fa-fw fa-trash   '></i></button>
                                </form>
                                 
                                </div>
                            </td>
                          </tr>
                         
                          
                                                  <!-- update Modal -->
                        <?php echo $formClass->plainModalHeader('uc'.$id,'Update '); ?>
                         
                                <form method='post'  action='message.php'>
                                  <fieldset>
                                    <legend></legend>
                                        <div class='form-group'>
                                            <label class='control-label col-lg-6'>Teacher: </label>	
                                            <div class='col-lg-12' id='teacher'>
                                              <select name='teacher' id='teacher' class='form-control'>
                                                  <option value="<?php echo $tid;?>"><?php echo $lname." ".$fname." ".$mname; ?></option>
                                                  <?php
                                                $sql = $classes->selectAllQueryAscWithAcitveQuery2();
                                                $smt = $classes->selectAll($sql);
                                                while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                                 <option value="<?php echo $row['teacherId']; ?>"><?php echo $row['teacherLname']." ".$row['teacherFname']." ".$row['teacherMname']; ?></option>
                                                 <?php 
                                                }
                                                 ?>
                                              </select>
                                               <span class='help-block'></span>
                                            </div>
                                        </div>
                                    <input type="hidden" value="<?php echo $id;?>" name="session">
                                      <?php
                                      echo     $formClass->triggerField('updateTeacher');
                                      
                                      echo     $formClass->submitButton('Change Teacher');
                                      ?>
                                  </fieldset>                                   
                                </form>
                        <?php echo $formClass->plainModalFooter(); ?>
                          
                            <?php } ?>
                        </tbody>
                  </table>
                </div>
                <div class="card-footer small text-muted">

                </div>
              </div> 
             
        </div>
            <div class="col-lg-6">
             <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-id-badge"></i>
                 Students: 
                </div>
                <div class="card-body">
                   <table class='table table-bordered' width='100%' cellspacing='0'>
                          <thead>
                          <tr>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $classes->getStudentClassQuery();
                            $result = $classes->selecStudentParent($sql,$cId);
                            $i = 1;
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                $lname    =   $row['studentLname'];
                                $fname    =   $row['studentFname'];
                                $mname    =   $row['studentMname'];
                                $studId   =   $row['studentId'];
                                $cId      =   $row['classId'];
                                ?>
                           <tr>
                            <td><?php echo $i++.". ".$lname." ".$fname." ".$mname; ?></td>
                           <td>
                           <div class="btn-group">
                   
                            <form method='post' action='message.php'>
                              <input type='hidden' name='studId' value='<?php echo $studId;?>'>
                              <input type='hidden' name='classId' value='<?php echo $cId;?>'>
                              <?php echo     $formClass->triggerField('studentClass'); ?>
                              <button type='submit' class='btn btn-danger' onclick="return confirm('Are you sure?');" title='Remove Student'><i class='fa fa-fw fa-trash  '></i></button>
                            </form>
                               
                           </div>
                          </td>
                          </tr>
                            <?php } ?>
                        </tbody>
                  </table>
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

  

    