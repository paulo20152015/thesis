<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
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
          </div> 



          
      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>


    