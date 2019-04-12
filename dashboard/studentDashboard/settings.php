<?php include_once('studentIncludes/header.php'); ?>
<?php include_once('studentIncludes/navigations.php'); ?>
<?php 
//for changing password
                    $row      = $classes->fetchUser($classes->checkExistQuery('student','studentId'),$CurrenUserId);
                    $hash     =    $row['studentPassword'];
if(isset($_POST['passwordChange'])){
    if(isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['password3'])){
        if(!empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['password3'])){
               $oldPass = $_POST['password1'];
               $newPass1=$_POST['password2'];
               $newPass2=$_POST['password3'];
               if(password_verify($oldPass, $hash)){
                   if($newPass1 == $newPass2){
                            $hashPass =  $formClass->hash($newPass1);
                            $sql      = $classes->updateOneQuery('student','studentPassword','studentId');
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
                     <form method="post" id="studentChangePassForm">
                       <div class="form-group">
                           <label>Old Password</label>
                           <input type="password"  maxlength="30" name="password1" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                           <label>New Password</label>
                           <input type="password"  maxlength="30" name="password2" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                           <label>Confirm Password</label>
                           <input type="password"  maxlength="30" name="password3" class="form-control" required>
                        </div>
                      
                         <input type="hidden" name="hash" value="<?php echo $hash;?>">
                         <input type="hidden" name="id" value="<?php echo $CurrenUserId;?>">
                         <?php echo $formClass->triggerField('passwordChange');?>
                        <button class="btn btn-success form-control" id="accountSettingPassBtn"><i class="fa fa-paper-plane-o  fa-lg"></i></button> 
                    </form>
                </div>
                <div class="card-footer small text-muted" id="studentChangePassMes">
    
                </div>
              </div>
          </div>
          




          
      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('studentIncludes/footer.php'); ?>


    