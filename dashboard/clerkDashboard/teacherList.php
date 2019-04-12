<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
   

    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <div class="btn-group" role="group" aria-label="...">

                </div>
            </ol>
        <div class="row">

             <!--teachers-->
             <div class="col-lg-12">
             <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
           Faculty 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="table" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                   <?php
                        $sql = $classes->selectAllQuery('teacher');
                        $smt = $classes->selectAll($sql);
                        $cou = 1;
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                         <td><?php echo $cou++;?>.</td>
                          <td><?php echo $row['teacherLname']." ".$row['teacherFname']." ".$row['teacherMname'];?></td>
                        
                          <td><?php echo $row['teacherGender'];?></td>
                           <td><?php echo $row['teacherContact'];?></td>

                        </tr>
                          <?php }?>
                 
                </tbody>
              </table>
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
<?php include_once('clerkIncludes/footer.php'); ?>
    