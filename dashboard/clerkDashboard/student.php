<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
<?php 

    if(isset($_POST['studentId'])){
        $_SESSION['studentId'] = $_POST['studentId'];
        $sId = $_SESSION['studentId'];
        $sql = $classes->checkExistQuery('student','studentId');
        $stud = $classes->fetchUser($sql,$sId);
        $studentFname = $stud['studentFname'];
        $studentMname = $stud['studentMname'];
        $studentLname = $stud['studentLname'];
        $studentCity  = $stud['studentAddCity'];
        $studentMuni  = $stud['studentAddMunicipality'];
        $studentBrgy  = $stud['studentAddBrgy'];
        $studentSt    = $stud['studentAddSt'];
        $studentLevel = $stud['studentLevel'];
        $studentLrn   = $stud['studentLrnNum'];
        $studentStat   = $stud['studentStat'];
        $studentUser   = $stud['studentUsername'];
    }
    else
        {
        $sId = $_SESSION['studentId'];
        $sql = $classes->checkExistQuery('student','studentId');
        $stud = $classes->fetchUser($sql,$sId);
        $studentFname = $stud['studentFname'];
        $studentMname = $stud['studentMname'];
        $studentLname = $stud['studentLname'];
        $studentCity  = $stud['studentAddCity'];
        $studentMuni  = $stud['studentAddMunicipality'];
        $studentBrgy  = $stud['studentAddBrgy'];
        $studentSt    = $stud['studentAddSt'];
        $studentLevel = $stud['studentLevel'];
        $studentLrn   = $stud['studentLrnNum'];
        $studentStat   = $stud['studentStat'];
        $studentUser   = $stud['studentUsername'];
        }
     //   



     

?>   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <strong>Student Info : </strong><br>
          Name : <?php echo $studentLname." ".$studentFname." ".$studentMname; ?> <br>
          Lrn : <?php echo $studentLrn; ?> 

      </ol>
        
      <div class="row">

        <div class="col-lg-5">
            <div class="card mb-3">
             <div class="card-header">
             <i class="fa fa-address-card "></i>
              Parent/Guardian Form
             </div>
             <div class="card-body">
                  <form id="parentForm" method="post">
            
                
            <div class="form-group">
                <label for="usr">Last Name: </label>
                <input type="text" class="form-control" maxlength="25" name="lname" required>
            </div>
            <div class="form-group">
                <label for="pwd">Middle Name: </label>
                <input type="text" class="form-control" maxlength="25" name="mname" required>
            </div>
            <div class="form-group">
                <label for="pwd">First Name: </label>
                <input type="text" class="form-control" maxlength="25" name="fname" required>
            </div>
            <div class="form-group">
                <label for="pwd">Contact Number: </label>
                <input type="number" class="form-control" name="contact" required>
                <input type="hidden" name="id" value="<?php echo $sId;?>">
                <?php echo $formClass->triggerField('parent');?>
            </div>
            <div class="form-group">
            <label for="pwd">Relation: </label>
            <select class="form-control" name="rel" required>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Guardian">Guardian</option>
            </select>
            </div>
            <div class="form-group">
            <label for="pwd">Gender : </label>
            <select class="form-control" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
             
            </select>
            </div>
                <button class="btn btn-success form-control" id="btnParent"><span class="fa fa-paper-plane"></span></button>    
                </form>
            </div>
             <div class="card-footer small text-muted" id="parentMes">
      
           </div>
        </div>            
      </div>
          
      <div class="col-lg-7">
           <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-address-card "></i>
            Parent/Guardian List
          </div>
          <div class="card-body">
             <table class='table table-bordered' width='100%' cellspacing='0'>
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Contact Number</th>
                      <th>Relation</th>                  
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $sql = $classes->selectStudentParentQuery();
                      $smt = $classes->selecStudentParent($sql,$sId);
                      while($row = $smt->fetch(PDO::FETCH_ASSOC) ){
                          $pFname = $row['parentLname'];
                          $pLname = $row['parentFname'];
                          $pMname = $row['parentMname'];
                          $pRel   = $row['relation'];
                          $pCon   = $row['parentContactNum'];
                          ?>
                     <tr>
                      <td><?php echo $pLname." ".$pFname." ".$pMname; ?></td>
                      <td><?php echo $pCon; ?></td>
                      <td><?php echo $pRel; ?></td>
                    </tr>
                      <?php } ?>
                  </tbody>
            </table>
          </div>
          <div class="card-footer small text-muted">
            
          </div>
        </div>   
      </div>
	
          <!--student address-->
        <div class="col-lg-6">
         <div class="card mb-3">
          <div class="card-header">
            <i class="fa "></i>
            Student Address
          </div>
           
          <div class="card-body">
               <form method="post" id="addressForm"> 
            <div class="form-group">
                <label for="usr">City : </label>
                <input type="text" class="form-control" maxlength="30" name="city" value="<?php echo $studentCity; ?>" >
            </div> 
            
            <div class="form-group">
                <label for="usr">Municipality : </label>
                <input type="text" class="form-control" maxlength="30" name="muni" value="<?php echo $studentMuni; ?>" >
            </div> 
              
             <div class="form-group">
                <label for="usr">Barangay : </label>
                <input type="text" class="form-control" maxlength="30" name="brgy" value="<?php echo $studentBrgy; ?>" >
             </div> 
              
            <div class="form-group">
                <label for="usr">Street : </label>
                <input type="text" class="form-control" maxlength="30" name="st" value="<?php echo $studentSt; ?>" >
                <input type="hidden" name="id" value="<?php echo $sId;?>">
                <?php echo $formClass->triggerField('address');?>
            </div> 
              <button class="btn btn-success form-control" id="btnAddressStudent" type="submit">Update</button>
            </form>
          </div>
          <div class="card-footer small text-muted" id="addressStudent">
   
          </div>
        </div>
            
        </div>
          
           <div class="col-lg-6">
            <div class="card mb-3">
                
              <div class="card-header">
                <i class="fa fa-level-up "></i>
                Grade Level
              </div>
              <div class="card-body">
                  <form id="levelForm" method="post">
                      <div class="form-group">
                      <select class="form-control" name="gLevel">
                          <option ><?php echo $studentLevel; ?></option>
                          <?php 
                          $sql = $classes->selectAllQuery('gradelevel');
                          $smt = $classes->selectAll($sql);
                          while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                          ?>
                          <option value="<?php echo $row['gradeLevel']; ?>"><?php echo $row['gradeLevel']; ?></option>                         
                          <?php } ?>
                      </select>
                          <input type="hidden" name="id" value="<?php echo $sId;?>">
                          <?php echo $formClass->triggerField('level');?>
                      </div>
                      <button class="btn btn-success" id="btnLevel"> Update Grade Level</button>
                       
                  </form>
              </div>
                         
              <div class="card-footer small text-muted" id="levelMes">

              </div>
                
              <div class="card-header">
                <i class="fa fa-refresh"></i>
                Password :
                <br>&nbsp;Default reset password : 12345678
              </div>
                
              <div class="card-body">
                  <div class="form-group">
                  <form method="post" id="passReset">
                      <div class="form-group">
                          <label> Username : <?php echo $studentUser; ?></label>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $sId;?>">
                      <input type="hidden" name="studentStat" value="<?php echo $studentStat;?>">
                      <?php echo $formClass->triggerField('stuPassword');?>
                    <button type="submit" class="btn btn-success" id="btnPassword">Password Reset</button>
                  </form>
                  </div>
              </div>
                 
              <div class="card-footer small text-muted">
                  <div id="passwordMes">
                  </div>
            </div>
                </div>
    </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>

    