<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
<?php 
//for changing password
                    $row      = $classes->fetchUser($classes->checkExistQuery('accounts','teacherId'),$CurrenUserId);
                    $hash     =    $row['password'];
                    $row      = $classes->fetchUser($classes->checkExistQuery('teacher','teacherId'),$CurrenUserId);
                    $cnumber  =    $row['teacherContact'];
if(isset($_POST['passwordChange'])){
    if(isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['password3'])){
        if(!empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['password3'])){
               $oldPass = $_POST['password1'];
               $newPass1=$_POST['password2'];
               $newPass2=$_POST['password3'];
               if(password_verify($oldPass, $hash)){
                   if($newPass1 == $newPass2){
                            $hashPass =  $formClass->hash($newPass1);
                            $sql      = $classes->updateOneQuery('accounts','password','teacherId');
                            $result   = $classes->updateOne($sql,$hashPass,$CurrenUserId);
                            if($result == true){
                            $passwordMes = 'Password Updated Successfully';
                            }else{
                            $passwordMes = 'Password Update Failed';
                            }   
                   }else{
                       $passwordMes = "new password and confirm password does not match";
                   }
               }else{
                   $passwordMes = "Incorrect Password";
               }
         }else{
             $passwordMes = "Fill out all fields";
         }
    }
}

if(isset($_POST['onturn'])){
    if(isset($_POST['val'])){
        $val = $_POST['val'];
        if($val == 1){
            $value = 0;
        }else{
            $value = 1;
        }
        $sql    = $classes->updateOneQuery('stat','status','id'); 
        $result = $classes->updateOne($sql,$value,1);
        if($result){
            $setmes = 'Updated';
        }else{
            $setmes = 'Failed';
        }
    }
}
?>   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          Username : <?php if(isset($username)){ echo $username; }?>
      </ol>
        
      <div class="row">
          <div class="col-lg-6">
               <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-id-badge"></i>
                  Change Password
                </div>
                <div class="card-body">
                     <form method="post" id="clerkChangePassForm">
                       <div class="form-group">
                           <label>Old Password</label>
                           <input type="password" maxlength="30" name="password1" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                           <label>New Password</label>
                           <input type="password" maxlength="30" name="password2" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                           <label>Confirm Password</label>
                           <input type="password" maxlength="30" name="password3" class="form-control" required>
                        </div>
                      
                         <input type="hidden" name="hash" value="<?php echo $hash;?>">
                         <input type="hidden" name="id" value="<?php echo $CurrenUserId;?>">
                         <?php echo $formClass->triggerField('passwordChange');?>
                        <button class="btn btn-success form-control" id="accountSettingPassBtn"><i class="fa fa-paper-plane-o  fa-lg"></i></button> 
                    </form>
                </div>
                <div class="card-footer small text-muted" id="clerkChangePassMes">
    
                </div>
              </div>
          </div>
          
          <div class="col-lg-6">
               <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-id-badge"></i>
                  Update Contact
                </div>
                <div class="card-body">
                    <form method="post" id="clerkContactForm">
                        
                        <div class="form-group">
                           <label>Contact Number</label>
                           <input type="number" name="cnum" class="form-control" value="<?php if(isset($cnumber)){ echo $cnumber;}  ?>" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $CurrenUserId;?>">
                         <?php echo $formClass->triggerField('clerkContact');?>
                        <button class="btn btn-success form-control" id="clerkContactBtn"><i class="fa fa-paper-plane-o  fa-lg"></i></button> 
                    </form>
                </div>
                <div class="card-footer small text-muted" id="clerkContactMes">
              
                </div>
              </div>
              
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-cog"></i>
                  Grade SMS Setting
                </div>
                <div class="card-body">
                    <form method="post" action="setting.php">

                         <?php
                         $sql      =  $classes->checkExistQuery('stat','id');
                         $rowset   =  $classes->fetchUser($sql,1);
                         $value    =  $rowset['status'];
                         echo $formClass->triggerField('onturn');?>
                        <input type="hidden" name="val" value="<?php echo $value;?>">
                        <button class="btn btn-success form-control" id="clerkContactBtn"><i class="fa fa-lg <?php if($value == 1){echo 'fa-toggle-on';}else{echo 'fa-toggle-off';}?>"></i> <?php if($value == 1){echo 'On';}else{echo 'Off';}?></button> 
                    </form>
                </div>
                <div class="card-footer small text-muted" id="clerkContactMes">
                    <?php
                    if(!empty($setmes)){
                       echo $setmes; 
                    }
                    ?>
                </div>
              </div>
          </div> 



          
      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('principalIncludes/footer.php'); ?>


    