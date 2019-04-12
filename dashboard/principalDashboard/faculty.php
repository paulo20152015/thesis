<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
   <?php 
       if(isset($_POST['actiTeacher'])){
        if(isset($_POST['activate'])){
            $activeStat = $_POST['stat'];
            $activeId   = $_POST['activate']; 
            if($activeStat == 1){
                $activeStat = 0;
            }else{
                $activeStat = 1;
            }
            $sql    = $classes->updateOneQuery('teacher','teacherStat','teacherId');
            $result = $classes->updateOne($sql,$activeStat,$activeId);
            if($result==true){
                $actiMes= 'Activated Successfully';
            }else{
                $actiMes= 'Error activating';
            }
        }
    }
   
   ?>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <div class="btn-group" role="group" aria-label="...">
                  <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#addFaculty">
                    <i class="fa fa-fw fa-plus-circle  "></i>
                    <span class="nav-link-text">
                      Faculty
                    </span>
                  </a>       
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
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th> </th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                   <?php
                        $sql = $classes->negateSelectQuery('teacher','accounts','teacher.teacherId','accounts.teacherId','accounts.role');
                        $smt = $classes->selectAllFilter($sql,'principal');
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        $i       = $row['teacherStat'];
                        $id      = $row['teacherId'];
                        $lname   = $row['teacherLname'];
                        $Fname   = $row['teacherFname'];
                        $Mname   = $row['teacherMname'];
                        $gender  = $row['teacherGender'];
                        $contact = $row['teacherContact'];
                        ?>
                        <tr>
                         
                          <td><?php echo $lname." ".$Fname." ".$Mname;?></td>
                        
                          <td><?php echo $gender;?></td>
                          <td><?php echo $contact;?></td>
                          <td>
                            <form method='post' action='facultyAccount.php'>
                            <input type='hidden' name='teacherId' value='<?php echo $id;?>'>
                            <button type='submit' class='btn btn-primary' title='Parent Info'><i class='fa fa-fw fa-cog '></i> Account</button>
                            </form>    
                          </td>
                          <?php if($i == 1){ ?>
                            <td>
                             <form method='post' action='faculty.php'>
                                <input type='hidden' name='stat' value='<?php echo $i;?>'>
                                <input type='hidden' name='activate' value='<?php echo $id;?>'>
                                <?php echo $formClass->triggerField('actiTeacher');?>
                                <button type='submit' class='btn btn-primary' title='Set as inactive'><i class='fa fa-fw fa-toggle-on'></i> Active</button>
                             </form>
                           </td>                        

                          <?php }else{ ?>
                          <td>
                                <form method='post' action='faculty.php'>
                                <input type='hidden' name='stat' value='<?php echo $i;?>'>
                                <input type='hidden' name='activate' value='<?php echo $id;?>'>
                                <?php echo $formClass->triggerField('actiTeacher');?>
                                <button type='submit' class='btn btn-primary' title='Set as active'><i class='fa fa-fw fa-toggle-off '></i> Inactive</button>
                                </form>
                          </td>
                          <?php }?>
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
    