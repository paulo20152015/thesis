<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
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
        /*
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
             $username = $lname.$fname.$mname.rand(10,1000);
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
         
         */
     /*
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
      * /

     //level update
     /*
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
      * */
      
          //password update
   /* if(isset($_POST['password'])){
 
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
    */
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
    
	
          <!--student address-->
        <div class="col-lg-6">
         <div class="card mb-3">
          <div class="card-header">
            <i class="fa "></i>
            Student Address
          </div>
           
          <div class="card-body">
       
            <div class="form-group">
                <label for="usr">City : </label>
                <input type="text" class="form-control" name="city" value="<?php echo $studentCity; ?>" readonly>
            </div> 
            
            <div class="form-group">
                <label for="usr">Municipality : </label>
                <input type="text" class="form-control" name="muni" value="<?php echo $studentMuni; ?>" readonly>
            </div> 
              
             <div class="form-group">
                <label for="usr">Barangay : </label>
                <input type="text" class="form-control" name="brgy" value="<?php echo $studentBrgy; ?>" readonly>
             </div> 
              
            <div class="form-group">
                <label for="usr">Street : </label>
                <input type="text" class="form-control" name="st" value="<?php echo $studentSt; ?>" readonly>
        
     
            </div> 
              
    
          </div>
          <div class="card-footer small text-muted">

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
                 
                      <div class="form-group">
                          <input type="text" value="<?php echo $studentLevel; ?>" class="form-control" readonly>
                      </div>
                     
                       
         
              </div>
                         
              <div class="card-footer small text-muted">
              </div>
              
            </div>
               
               
          <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-address-card "></i>
            Parent/Guardian List
          </div>
          <div class="card-body">
             <table class='table table-bordered' width='100%' cellspacing='0'>
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Contact Number</th>
                      <th>Relation</th>                  
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $sql = $classes->selectStudentParentQuery();
                      $smt = $classes->selecStudentParent($sql,$sId);
                      $cou = 1;
                      while($row = $smt->fetch(PDO::FETCH_ASSOC) ){
                          $pFname = $row['parentLname'];
                          $pLname = $row['parentFname'];
                          $pMname = $row['parentMname'];
                          $pRel   = $row['relation'];
                          $pCon   = $row['parentContactNum'];
                          ?>
                     <tr>
                      <td><?php echo $cou++; ?>.</td>
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
    </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('principalIncludes/footer.php'); ?>

    