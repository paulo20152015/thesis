<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
<?php 
    if(isset($_POST['teacherId'])){
        $_SESSION['teacherId'] = $_POST['teacherId'];
        $tId     = $_SESSION['teacherId'];
        $sql     = $classes->checkExistQuery('teacher','teacherId');
        $teacher = $classes->fetchUser($sql,$tId);
        $sql     = $classes->checkExistQuery('accounts','teacherId');
        $tAcc    = $classes->fetchUser($sql,$tId);
        $tFname  = $teacher['teacherFname'];
        $tMname  = $teacher['teacherMname'];
        $tLname  = $teacher['teacherLname'];
        $tGender = $teacher['teacherGender'];
        $tActive = $teacher['teacherStat'];
        $tRole   = $tAcc['role'];
        $tUser   = $tAcc['username'];
        if($tActive == 1){
            $stat = 'Active';
        }else{
            $stat = 'Inactive';
        }
    }
    else
        {
        $tId     = $_SESSION['teacherId'];
        $sql     = $classes->checkExistQuery('teacher','teacherId');
        $teacher = $classes->fetchUser($sql,$tId);
        $sql     = $classes->checkExistQuery('accounts','teacherId');
        $tAcc    = $classes->fetchUser($sql,$tId);
        $tFname  = $teacher['teacherFname'];
        $tMname  = $teacher['teacherMname'];
        $tLname  = $teacher['teacherLname'];
        $tGender = $teacher['teacherGender'];
        $tActive = $teacher['teacherStat'];
        $tRole   = $tAcc['role'];
        $tUser   = $tAcc['username'];
        if($tActive == 1){
            $stat = 'Active';
        }else{
            $stat = 'Inactive';
        }
        }
     //   
     if(isset($_POST['parent'])){
         
         if(!empty($_POST['lname']) && !empty($_POST['mname']) && !empty($_POST['fname']) && !empty($_POST['gender']) && !empty($_POST['contact']) && !empty($_POST['rel'])){
         if(!empty($_POST['id'])){
             $fname   = $_POST['lname'];
             $mname   = $_POST['mname'];
             $lname   = $_POST['fname'];
             $contact = $_POST['contact'];
             $rel     = $_POST['rel'];
             $sId     = $_POST['id'];
             $gend    = $_POST['gender'];
             $username = $lname.$fname.rand(10,1000);
             $pass     = $formClass->hash('123456');
             $sql     = $classes->insertParentQuery();
             $result  = $classes->insertParent($sql,$fname,$lname,$mname,$rel,$contact,$gend,$username,$pass);
             if($result == true){
                    $sql    = $classes->stuParQuery();
                    $par    = $classes->stuPar($sql,$fname,$mname,$lname,$contact);
                    $pId    = $par['parentId'];
                    $query  = $classes->insertTwoQuery('studentparent','studentId','parentId');                   
                    $classes->insertTwo($query,$sId,$pId);
                 $mes = 'Added successfully and account generated <br>'
                         . 'username : '.$username.'<br> Password default is 123456';
             }else{
                 $mes = 'Submission fail';
             }
         }else{
            $mes = 'Form can not be submitted'; 
         }
         }   
     }
     //address update
     if(isset($_POST['address'])){
         if(isset($_POST['city']) && isset($_POST['muni']) && isset($_POST['brgy']) && isset($_POST['st'])){
          if(!empty($_POST['id'])){
              $city = $_POST['city'];
              $muni = $_POST['muni'];
              $brgy = $_POST['brgy'];
              $st = $_POST['st'];
              $id = $_POST['id'];
              $sql    = $classes->updateFourQuery('student','studentAddCity','studentAddMunicipality','studentAddBrgy','studentAddSt','studentId');
              $result = $classes->updateFour($sql,$city,$muni,$brgy,$st,$id);
              if($result == true){
                  $addressMes = "Updated successfully refresh to see changes";
                  
              }else{
                  $addressMes = "Update Error";
                 
              }
          }else{
              $addressMes = "Invalid request";
          }   
         }
     }
     //level update
    if(isset($_POST['level'])){
      if(isset($_POST['gLevel'])){
        if(!empty($_POST['id'])){
          $gLevel = $_POST['gLevel'];
              $id = $_POST['id'];
          $sql    = $classes->updateOneQuery('student','studentLevel','studentId');
          $result = $classes->updateOne($sql,$gLevel,$id);
             if($result == true){
                  $levelMes = "Updated successfully refresh to see changes";
                  
              }else{
                  $levelMes = "Update Error";
                 
              }
          }else{
              $levelMes = "Invalid request";
          }   
         }
     }
          //password update
    if(isset($_POST['password'])){
 
        if(!empty($_POST['id'])){
            if($studentStat == 1){
          $hash = $formClass->hash('123456');
          $id   = $_POST['id'];
          $sql    = $classes->updateOneQuery('student','studentPassword','studentId');
          $result = $classes->updateOne($sql,$hash,$id);
             if($result == true){
                  $passMes = "Reset Successfully";
                  
              }else{
                  $passMes = "Reset Error";  
              }
            }else{
                $passMes = "Error student does not have an account yet";
            }  
          }else{
              $passMes = "Invalid request";
          }   
         
     }
?>   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <strong>Faculty Info  </strong><br>
          Name &nbsp;&nbsp;&nbsp;: <?php echo $tLname." ".$tFname." ".$tMname; ?> <br>
          Role &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $tRole; ?> <br>
          Gender &nbsp;: <?php echo $tGender; ?><br>
          Status &nbsp;&nbsp;&nbsp;: <?php echo $stat; ?>
      </ol>
        
      <div class="row">
         <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-user-o"></i>
                 Faculty Role 
              </div>
              <div class="card-body">
                    <form id="teacherRoleForm" method="post">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option value="<?php echo $tRole;?>"><?php echo $tRole;?></option> 
                                <option value="clerk">clerk</option> 
                                <option value="teacher">teacher</option> 
                            </select>
                        </div>
                            <input type="hidden" name="id" value="<?php echo $tId;?>">
                            <?php echo $formClass->triggerField('teacherRole');?>
                        <button class="btn btn-success form-control" id="btnRoleTeacher"><i class="fa fa-paper-plane"></i> Update</button>
                    </form>              
              </div>
              <div class="card-footer small text-muted" id="teacherRoleMes">
 
              </div>
            </div>
        </div>
          
         <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-refresh"></i>
                 Password :
                <br>&nbsp;Default reset password : 12345678
              </div>
              <div class="card-body">
                
  
                   <form method="post" id="resetTeacherPass">
                      <div class="form-group">
                          <label> Username : <?php echo $tUser; ?></label>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $tId;?>">
                      <?php echo $formClass->triggerField('teacherPassword');?>
                    <button type="submit" class="btn btn-success" id="btnTeacherReset">Password Reset</button>
                  </form>
                
              </div>
              <div class="card-footer small text-muted" id="teacherResetMes">
       
              </div>
            </div>
        </div>
          
          

          
    </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('principalIncludes/footer.php'); ?>

    