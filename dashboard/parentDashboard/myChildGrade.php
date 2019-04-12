<?php include_once('parentIncludes/header.php'); ?>
<?php include_once('parentIncludes/navigations.php'); ?>
  <?php

                    
        if(isset($_POST['studentId'])){
       
        $_SESSION['studentId']   = $_POST['studentId'];


      
        $studId   = $_SESSION['studentId'];
  
    }
    else
        {
       
        $studId    = $_SESSION['studentId'];

        }
  
  ?>
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <form id="viewGrades" method="post">
              <select name="cId" class="form-control" id="selectMe" required>
                  <option value=""></option>
                  <?php
                  $sql = $classes->getAdmitClassQuery();
                  $smt = $classes->selectParentStudent($sql,$studId);
                  while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                      $level    = $row['gradeLevel'];
                      $section  = $row['sectionName'];
                      $category = $row['categoryName'];
                      $sy       = $row['sy'];
                      $cId       = $row['classId'];
                      $text     = "Grade ".$level." ".$section." S.Y ".$sy." ".$category; 
                      ?>

                  <option value ="<?php echo $cId;  ?>" ><?php echo $text; ?></option>
                  <?php
                  }
                  ?>
                  <input type="hidden" name="id" value="<?php echo $studId; ?>">
              </select>
          </form>
      </ol>
        
      <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i>
               Student Grade
              </div>
              <div class="card-body">
                <div id="viewGradeMes">
                    
                    
  
                </div>
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
<?php include_once('parentIncludes/footer.php'); ?>


    