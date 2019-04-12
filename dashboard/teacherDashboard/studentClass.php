<?php include_once('teacherIncludes/header.php'); ?>
<?php include_once('teacherIncludes/navigations.php'); ?>
  <?php
  //for changing password
                    $row      = $classes->fetchUser($classes->checkExistQuery('accounts','teacherId'),$CurrenUserId);
                    $hash     =    $row['password'];
                    $row      = $classes->fetchUser($classes->checkExistQuery('teacher','teacherId'),$CurrenUserId);
                    $cnumber  =    $row['teacherContact'];
                    
        if(isset($_POST['categoryName']) && isset($_POST['sy']) 
              && isset($_POST['classId'])){
      
        $_SESSION['categoryName']  = $_POST['categoryName'];
        $_SESSION['sy']            = $_POST['sy'];
        $_SESSION['classId']       = $_POST['classId']; 
       
        $cat       = $_SESSION['categoryName'];
        $sy        = $_SESSION['sy'];
        $classId   = $_SESSION['classId'];
    }
    else
        {
        $cat       = $_SESSION['categoryName'];
        $sy        = $_SESSION['sy'];
        $classId   = $_SESSION['classId'];
        }
  
  ?>
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <form id="smsForm" method="post">
              <div class="row">
                  
              <div class="form-group col-lg-6">
                  <input type="hidden" name="cla" value="<?php echo $classId;?>">
                  <select name="gradeCat" class="form-control">
                      <option value=""></option>
                      <?php
                      if($cat == '1st Semester' || $cat == '2nd Semester'){
                      ?>
                      <option value="6">Mid Term</option>
                      <option value="7">Final Term</option>
                      <?php }?>
                      
                      <?php
                      if($cat == 'Summer'){
                      ?>
                      <option value="1">Summer</option>
                      <?php }?>
                      <?php
                      if($cat == 'Regular'){
                      ?>
                      <option value="2">First Quarter</option>
                      <option value="3">Second Quarter</option>
                      <option value="4">Third Quarter</option>
                      <option value="5">Fourth Quarter</option>                  
                      <?php }?>
                  </select>
                  <?php echo $formClass->triggerField('processSMS');?>
              </div>
              <div class="form-group col-lg-2">
                <button class=" nav-link  btn btn-primary form-control" id="smsGrade" 
                        <?php
                         $sql      =  $classes->checkExistQuery('stat','id');
                         $rowset   =  $classes->fetchUser($sql,1);
                         $value    =  $rowset['status'];
                        if($value == 1){
                            echo '';
                        }else{
                            echo 'disabled';
                        }
                            
                        ?>
                        ><i class="fa fa-location-arrow" ></i> Send Grade</button>
              </div>
              
              </div>
          </form>
      </ol>
        
      <div class="row">
          
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa "></i>
              SMS Result:<br>
              
              </div>
              <div class="card-body">
                  note: The system only send SMS to parents with contact number
                <div id="viewSMSmes">
                    
                    
  
                </div>
              </div>
              <div class="card-footer small text-muted">

              </div>
            </div>
          </div>
<!-- students table -->
        <?php echo $formClass->tableHeader('Students','dataTable'); ?>
                  <thead>
                    <tr>
                      <th>LRN Number</th>
                      <th>Name</th>
                      <?php 
                      if($cat == '1st Semester' || $cat == '2nd Semester'){
                      ?>
                      <th> Mid Term</th>
                      <th> Final Term</th>
                      <?php }
                      if($cat == 'Regular'){
                      ?>
                      <th> First Quarter</th>
                      <th> Second Quarter</th>
                      <th> Third Quarter</th>
                      <th> Fourth Quarter</th>
                      <?php }
                      if($cat == 'Summer'){
                      ?>
                      <th> Summer</th>
                    
                      <?php }?>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                  <?php 
                      if($cat == '1st Semester' || $cat == '2nd Semester'){
                      ?>
                      <th>  </th>
                      <th>  </th>
                      <?php }
                      if($cat == 'Regular'){
                      ?>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <?php }
                      if($cat == 'Summer'){
                      ?>
                      <th> </th>
                    
                      <?php }?>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $sql = $classes->getClassStudentQuery();
                    $smt = $classes->selectAllQueryAscWithAcitve($sql,$classId);
                    while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        $lrn        = $formClass->c($row['studentLrnNum']);
                        $lname      = $formClass->c($row['studentLname']);
                        $fname      = $formClass->c($row['studentFname']);
                        $mname      = $formClass->c($row['studentMname']);
                        $level      = $formClass->c($row['studentLevel']);
                        $studId     = $formClass->c($row['studentId']);
                        $sqlCount   = $classes->checkExistQuery('session','classId');
                        $totalClass = $classes->checkExist($sqlCount,$classId);
                    ?>
                    <tr>
                      <td><?php echo $lrn;?></td>
                      <td><?php echo $lname." ".$fname." ".$mname;?></td>
                     <?php 
                      if($cat == '1st Semester' || $cat == '2nd Semester'){
                          $sqlc   = $classes->getgradestatus();
                          $count1 = $classes->selectThreeFilter($sqlc,$classId,$studId,6);
                          $count2 = $classes->selectThreeFilter($sqlc,$classId,$studId,7);
                      ?>
                      <td class="<?php if($totalClass == $count1){ echo 'bg-primary'; }elseif($count1 == 0){ echo 'bg-default';}else{ echo 'bg-warning';}?>"><?php if($totalClass == $count1){ echo 'Completed'; }elseif($count1 == 0){ echo '---';}else{ echo 'not yet complete';}?></td>
                      <td class="<?php if($totalClass == $count2){ echo 'bg-primary'; }elseif($count2 == 0){ echo 'bg-default';}else{ echo 'bg-warning';}?>"><?php if($totalClass == $count2){ echo 'Completed'; }elseif($count2 == 0){ echo '---';}else{ echo 'not yet complete';}?></td>
                      <?php }
                      if($cat == 'Regular'){
                          $sqlc   = $classes->getgradestatus();
                          $count1 = $classes->selectThreeFilter($sqlc,$classId,$studId,2);
                          $count2 = $classes->selectThreeFilter($sqlc,$classId,$studId,3);
                          $count3 = $classes->selectThreeFilter($sqlc,$classId,$studId,4);
                          $count4 = $classes->selectThreeFilter($sqlc,$classId,$studId,5);
                      ?>
                      <td class="<?php if($totalClass == $count1){ echo 'bg-primary'; }elseif($count1 == 0){ echo 'bg-default';}else{ echo 'bg-warning';}?>"><?php if($totalClass == $count1){ echo 'Completed'; }elseif($count1 == 0){ echo '---';}else{ echo 'not yet complete';}?></td>
                      <td class="<?php if($totalClass == $count2){ echo 'bg-primary'; }elseif($count2 == 0){ echo 'bg-default';}else{ echo 'bg-warning';}?>"><?php if($totalClass == $count2){ echo 'Completed'; }elseif($count2 == 0){ echo '---';}else{ echo 'not yet complete';}?></td>
                      <td class="<?php if($totalClass == $count3){ echo 'bg-primary'; }elseif($count3 == 0){ echo 'bg-default';}else{ echo 'bg-warning';}?>"><?php if($totalClass == $count3){ echo 'Completed'; }elseif($count3 == 0){ echo '---';}else{ echo 'not yet complete';}?></td>
                      <td class="<?php if($totalClass == $count4){ echo 'bg-primary'; }elseif($count4 == 0){ echo 'bg-default';}else{ echo 'bg-warning';}?>"><?php if($totalClass == $count4){ echo 'Completed'; }elseif($count4 == 0){ echo '---';}else{ echo 'not yet complete';}?></td>
                      <?php }
                      if($cat == 'Summer'){
                          $sqlc   = $classes->getgradestatus();
                          $count1 = $classes->selectThreeFilter($sqlc,$classId,$studId,1);
                      ?>
                      <td class="<?php if($totalClass == $count1){ echo 'bg-primary'; }elseif($count1 == 0){ echo 'bg-default';}else{ echo 'bg-warning';}?>"><?php if($totalClass == $count1){ echo 'Completed'; }elseif($count1 == 0){ echo '---';}else{ echo 'not yet complete';}?></td>
                    
                      <?php }?> 
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
        <?php echo $formClass->tableFooter();?>        
      

                  
      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('teacherIncludes/footer.php'); ?>


    