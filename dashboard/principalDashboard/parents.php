<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
   

    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                
            </ol>
        <div class="row">

             <div class="col-lg-12">
             <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
           Parents / Guardian
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NAME </th>
                    <th>GENDER </th>
                    <th>Contact Number </th>
                    <th></th>
                   
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                  </tr>
                </tfoot>
                <tbody>
                   <?php
                        $sql = $classes->selectAllQuery('parent');
                        $smt = $classes->selectAll($sql);
                        $cou = 1;
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                            $lname   = $row['parentLname'];
                            $fname   = $row['parentFname'];
                            $mname   = $row['parentMname'];
                            $gender  = $row['parentGender'];
                            $contact = $row['parentContactNum'];
                            $pId     = $row['parentId'];
                            
                        ?>
                        <tr>
                         <td><?php echo $cou++;?>.</td>
                          <td><?php echo $lname." ".$fname." ".$mname;?></td>
                        
                          <td><?php echo $gender;?></td>
                           <td><?php echo $contact;?></td>
                  
                          <td>
                            <form method='post' action='parent.php'>
                            <input type='hidden' name='parentId' value='<?php echo $pId;?>'>
                            <button type='submit' class='btn btn-primary' title='Parent Info'><i class='fa fa-fw fa-user-circle'></i> View</button>
                            </form>    
                          </td>

                               

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
<?php include_once('principalIncludes/footer.php'); ?>
    