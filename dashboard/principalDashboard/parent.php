<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
<?php 
    if(isset($_POST['parentId'])){
        $_SESSION['parentId'] = $_POST['parentId'];
        $pId = $_SESSION['parentId'];
        $sql = $classes->checkExistQuery('parent','parentId');
        $parent = $classes->fetchUser($sql,$pId);
        $parentFname    = $parent['parentFname'];
        $parentMname    = $parent['parentMname'];
        $parentLname    = $parent['parentLname'];
        $parentContact  = $parent['parentContactNum'];
        $parentUser     = $parent['parentUsername'];

    }
    else
        {
        $pId = $_SESSION['parentId'];
        $sql = $classes->checkExistQuery('parent','parentId');
        $parent = $classes->fetchUser($sql,$pId);
        $parentFname    = $parent['parentFname'];
        $parentMname    = $parent['parentMname'];
        $parentLname    = $parent['parentLname'];
        $parentContact  = $parent['parentContactNum'];
        $parentUser     = $parent['parentUsername'];
        }
     // 
        /*
      if(isset($_POST['relation'])){
          if(!empty($_POST['lrn']) && !empty($_POST['id'])){
              $lrn   = $_POST['lrn'];
              $pId   = $_POST['id'];
              $sql   = $classes->checkExistQuery('student','studentLrnNum');
              $count = $classes->checkExist($sql,$lrn);
            if($count == 0){
                $relMes = "Student does not exist";
            }else{
              $sql    = $classes->checkExistQuery('student','studentLrnNum');
              $row    = $classes->fetchUser($sql,$lrn);
              $sId    =  $row['studentId'];
              $sql    = $classes->insertTwoQuery('studentparent','studentId','parentId');
              $result = $classes->insertTwoReturn($sql,$sId,$pId);
              if($result == true){
                  $relMes = "Student related successfully";
              }else{
                  $relMes = "Submission Fail";
              }
            }  
          }else{
              $relMes = "An error has occur";
          }
      } 
      //contact number update
    if(isset($_POST['contactNumber'])){
      if(isset($_POST['cnum'])){
        if(!empty($_POST['id'])){
            $cnum = $_POST['cnum'];
              $id = $_POST['id'];
          $sql    = $classes->updateOneQuery('parent','parentContactNum','parentId');
          $result = $classes->updateOne($sql,$cnum,$id);
             if($result == true){
                  $cnumMes = "Updated successfully refresh to see changes";
                  
              }else{
                  $cnumMes = "Update Error";
                 
              }
          }else{
              $cnumMes = "Invalid request";
          }   
         }
     }

           //password update
    if(isset($_POST['password'])){
 
        if(!empty($_POST['id'])){
            
          $hash = $formClass->hash('123456');
          $id   = $_POST['id'];
          $sql    = $classes->updateOneQuery('parent','parentPassword','parentId');
          $result = $classes->updateOne($sql,$hash,$id);
             if($result == true){
                  $passMes = "Reset Successfully";
                  
              }else{
                  $passMes = "Reset Error";  
              }
             
          }else{
              $passMes = "Invalid request";
          } 
    }
         
         */

?>   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <br><strong>Parent/Guardian Informaion</strong> : <br>
          Name : <?php echo $parentLname." ".$parentFname." ".$parentMname; ?> 
          
      </ol>
        
      <div class="row">
          
           <div class="col-lg-8">
             <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-id-badge"></i>
                  Name of Children
                </div>
                <div class="card-body">
                   <table class='table table-bordered' width='100%' cellspacing='0'>
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>LRN</th>
                            <th>Name</th>
                            <th>Gender</th>  
                            <th>Grade</th> 
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $classes->selectParentStudentQuery();
                            $smt = $classes->selectParentStudent($sql,$pId);
                            $cou = 1;
                            while($row = $smt->fetch(PDO::FETCH_ASSOC) ){
                                $studentFname = $row['studentFname'];
                                $studentMname = $row['studentMname'];
                                $studentLname = $row['studentLname'];
                                $studentLevel = $row['studentLevel'];
                                $studentGender = $row['studentGender'];
                                $studentLrn   = $row['studentLrnNum'];
                                ?>
                           <tr>
                            <td><?php echo $cou++; ?></td>
                            <td><?php echo $studentLrn; ?></td>
                            <td><?php echo $studentLname." ".$studentFname." ".$studentMname; ?></td>
                            <td><?php echo $studentGender; ?></td>
                            <td><?php echo $studentLevel; ?></td>
                          </tr>
                            <?php } ?>
                        </tbody>
                  </table>
                </div>
                <div class="card-footer small text-muted">

                </div>
              </div>   
            </div>
          

          
         <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-phone-square"></i>
                 Contact Number
              </div>
              <div class="card-body">
                
                  
                        <div class="form-group">
                            <label>Mobile Num</label>
                            <input type="number" class="form-control" name="cnum" placeholder="Enter Mobile Number" value="<?php echo $parentContact;?>"   readonly>
                        </div>
                            <input type="hidden" name="id" value="<?php echo $pId;?>" >
                            <?php echo $formClass->triggerField('contactNumber');?>
                  
                
              </div>
              <div class="card-footer small text-muted">
               <?php if(!empty($cnumMes)){
                     echo $cnumMes;
                 }?>
              </div>
            </div>
        </div>
          

          
          
      </div>
      
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('principalIncludes/footer.php'); ?>

  

    