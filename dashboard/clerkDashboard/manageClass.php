<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
   

    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <div class="btn-group" role="group" aria-label="...">
                    <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#addClass">
                        <i class="fa fa-fw fa-plus-circle "></i>
                        <span class="nav-link-text">
                        Class Grade 7-10</span>
                    </a>   
                     <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#addClass2">
                        <i class="fa fa-fw fa-plus-circle "></i>
                        <span class="nav-link-text">
                        Class Grade 11-12</span>
                    </a>
                </div>
            </ol>
        <div class="row">

             <!--second table for grade 1-10-->
             <div class="col-lg-12">
             <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
           Classes for Grade 7-10
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="table" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Section</th>
                    <th>Adviser</th>
                    <th>Grade Level</th>
                    <th>School Year</th>
                    <th>Category</th>
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
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                   <?php 
                          $sql = $classes->viewClassQueryNot();
                          $smt = $classes->viewClass($sql,1);
                          $cou = 1;
                          while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                              $id = $row['classId'];
                              ?> 
                        <tr>
                          <td><?php echo $cou++;?>.</td>      
                          <td><?php echo $row['sectionName'];?></td>                          
                          <td><?php echo $row['teacherLname']." ".$row['teacherFname']." ".$row['teacherMname'] ;?></td>
                          <td><?php echo $row['gradeLevel'];?></td>
                          <td><?php echo $row['sy'];?></td>
                          <td><?php echo $row['categoryName'];?></td>
                          
                          <td>
                              <div class="btn-group">
                                
                                  
                            <form method='post' action='class.php'>
                              <input type='hidden' name='classId' value='<?php echo $id;?>'>
                              <button type='submit' class='btn btn-primary' title='Class Subjects'><i class='fa fa-fw fa-book  '></i> Manage</button>
                            </form>
                                  
                            <form method='post' action='message.php'>
                              <input type='hidden' name='classId' value='<?php echo $id;?>'>
                              <?php echo     $formClass->triggerField('deleteClass'); ?>
                              <button type='submit' class='btn btn-danger' onclick="return confirm('Are you sure?');" title='Delete Class'><i class='fa fa-fw fa-trash  '></i></button>
                            </form>
                                  </div>
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
                  
             <!--second table for grade 11-12-->
             <div class="col-lg-12">
             <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
           Classes for Grade 11-12
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Section</th>
                    <th>Adviser</th>
                    <th>Grade Level</th>
                    <th>School Year</th>
                    <th>Category</th>
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
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                   <?php 
                          $sql = $classes->viewClassQuery();
                          $smt = $classes->viewClass($sql,2);
                          $cou = 1;
                          while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                              $id = $row['classId'];
                              ?> 
                        <tr>
                          <td><?php echo $cou++;?>.</td>   
                          <td><?php echo $row['sectionName'];?></td>                          
                          <td><?php echo $row['teacherLname']." ".$row['teacherFname']." ".$row['teacherMname'] ;?></td>
                          <td><?php echo $row['gradeLevel'];?></td>
                          <td><?php echo $row['sy'];?></td>
                          <td><?php echo $row['categoryName'];?></td>
                          
                          <td>
                           <div class="btn-group">
                              
                            <form method='post' action='class.php'>
                              <input type='hidden' name='classId' value='<?php echo $id;?>'>
                              <button type='submit' class='btn btn-primary' title='Class Subjects'><i class='fa fa-fw fa-book  '></i> Manage</button>
                            </form>
                            <form method='post' action='message.php'>
                              <input type='hidden' name='classId' value='<?php echo $id;?>'>
                              <?php echo     $formClass->triggerField('deleteClass'); ?>
                              <button type='submit' class='btn btn-danger' onclick="return confirm('Are you sure?');" title='Delete Class'><i class='fa fa-fw fa-trash  '></i></button>
                            </form>
                           </div>
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
<?php include_once('clerkIncludes/footer.php'); ?>
    