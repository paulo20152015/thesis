<?php include_once('studentIncludes/header.php'); ?>
<?php include_once('studentIncludes/navigations.php'); ?>

  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
            <form method="POST" class="form-inline" id="syForm">
             <div class="form-group">
                 <label for="sy"> School Year :&nbsp;</label>
               <select id="sy" name="sy" class="form-control" required>
                   <option value=""></option>
                        <?php
                        $sql = $classes->selectAllQueryAscWithAcitveQuery('schoolyear','syId','active');
                        $smt = $classes->selectAllQueryAscWithAcitve($sql,1);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['syId']; ?>"><?php echo $row['sy']; ?></option>
                         <?php 
                        }
                         ?>
               </select>
              <select id="category" name="category" class="form-control" required>
                   <option value=""></option>
                        <?php
                        $sql = $classes->selectAllQuery('category');
                        $smt = $classes->selectAll($sql);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['categoryName']; ?>"><?php echo $row['categoryName']; ?></option>
                         <?php 
                        }
                         ?>
               </select>
                 <input type="hidden" name="currentId" value="<?php echo $CurrenUserId; ?>">
             </div>
             &nbsp;<button type="submit" class="btn btn-default" id="btnView">View</button>
           </form>
      </ol>
        
      <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i>
               My Schedule
              </div>
              <div class="card-body">
                <div id="viewMes">
                    
                    
  
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


    