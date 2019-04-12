<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
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
                            while($row = $smt->fetch(PDO::FETCH_ASSOC) ){
                                $studentFname = $row['studentFname'];
                                $studentMname = $row['studentMname'];
                                $studentLname = $row['studentLname'];
                                $studentLevel = $row['studentLevel'];
                                $studentGender = $row['studentGender'];
                                $studentLrn   = $row['studentLrnNum'];
                                ?>
                           <tr>
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
                <i class="fa fa-plus-circle"></i>
                 Student Relation
              </div>
              <div class="card-body">
                
                    <form id="relForm" method="post">
                        <div class="form-group">
                            <label>Student Lrn</label>
                            <input type="number" class="form-control" name="lrn" placeholder="Enter Student LRN" required>
                        </div>
                            <input type="hidden" name="id" value="<?php echo $pId;?>">
                            <?php echo $formClass->triggerField('relation');?>
                        <button class="btn btn-success form-control" id="btnRel"><i class="fa fa-plus-circle"></i> Add</button>
                    </form>
                
              </div>
              <div class="card-footer small text-muted" id="relMes">
             
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
                
                    <form id="parentContactForm" method="post">
                        <div class="form-group">
                            <label>Mobile Num</label>
                            <input type="number" class="form-control" name="cnum" placeholder="Enter Mobile Number" value="<?php echo $parentContact;?>"   required>
                        </div>
                            <input type="hidden" name="id" value="<?php echo $pId;?>">
                            <?php echo $formClass->triggerField('contactNumber');?>
                        <button class="btn btn-success form-control" id="btnContactParent"><i class="fa fa-paper-plane"></i> Update</button>
                    </form>
                
              </div>
              <div class="card-footer small text-muted" id="parentContactMes">
 
              </div>
            </div>
        </div>
          
         <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-refresh"></i>
                 Password :
                <br>&nbsp;Default reset password : 123456
              </div>
              <div class="card-body">
                
  
                   <form method="post" id="resetParentPass">
                      <div class="form-group">
                          <label> Username : <?php echo $parentUser; ?></label>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $pId;?>">
                      <?php echo $formClass->triggerField('parPassword');?>
                    <button type="submit" class="btn btn-success" id="btnParentReset">Password Reset</button>
                  </form>
                
              </div>
              <div class="card-footer small text-muted" id="parentResetMes">
       
              </div>
            </div>
        </div>
          
          
      </div>
      
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>

  

    