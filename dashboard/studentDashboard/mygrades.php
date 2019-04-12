<?php include_once('studentIncludes/header.php'); ?>
<?php include_once('studentIncludes/navigations.php'); ?>

  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <form id="viewGrades" method="post">
              <select name="cId" class="form-control" id="selectMe" required>
                  <option value=""></option>
                  <?php
                  $sql = $classes->getAdmitClassQuery();
                  $smt = $classes->selectParentStudent($sql,$CurrenUserId);
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
                  <input type="hidden" name="id" value="<?php echo $CurrenUserId; ?>">
              </select>
          </form>
      </ol>
        
      <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i>
               My Grades
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
<?php include_once('studentIncludes/footer.php'); ?>


    