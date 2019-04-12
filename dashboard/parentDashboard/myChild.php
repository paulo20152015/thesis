<?php include_once('parentIncludes/header.php'); ?>
<?php include_once('parentIncludes/navigations.php'); ?>
   

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">

        </ol>

        
       
        <div class="row">
            
              <div class="col-lg-3">
              </div>
                
              <div class="col-lg-6">
               <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-id-badge"></i>
                  Student Registered to you
                </div>
                <div class="card-body">
                     
                    
                    
                   <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                          <tr>
                              <th>LRN</th>     
                              <th>Name</th>
                              <th></th>
                          </tr>
                        </thead>

                       <tbody > 
                         <?php
                         $sql = $classes->getParentsStudents();
                         $smt = $classes->fetchField($sql,$CurrenUserId);
                            while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        $lrn    = $formClass->c($row['studentLrnNum']);
                        $lname  = $formClass->c($row['studentLname']);
                        $fname  = $formClass->c($row['studentFname']);
                        $mname  = $formClass->c($row['studentMname']);
                        $level  = $formClass->c($row['studentLevel']);
                        $studId = $formClass->c($row['studentId']);
                        $name   = $lname." ".$fname." ".$mname;
                             ?>
                            <tr>
                                <td><?php echo $lrn ;?></td>
                                <td><?php echo $name;?></td>
                                
                                <td>
                                    <form method='post' action='myChildGrade.php'>
                                        <input type='hidden' name='studentId' value='<?php echo $studId;?>'>
                                        <button type='submit' class='btn btn-primary' title='View his grades'><i class='fa fa-fw fa-user-circle-o  '></i> View</button>
                                    </form>
                                    
                                </td>
                                
                            </tr>    
                         <?php } ?>
                        </tbody>
		     </table>  
                   </div>
                    
                    
                    
                    
                </div>
                <div class="card-footer small text-muted" id="parentChangePassMes">
    
                </div>
               </div>
              </div>
                
              <div class="col-lg-3">
              </div>
              
              
    
        </div>
		
			
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include_once('parentIncludes/footer.php'); ?>
    
