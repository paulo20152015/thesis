<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
      </ol>
        
      <div class="row">

        <!-- students table -->
        <?php echo $formClass->tableHeader('Students','dataTable'); ?>
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>LRN Number</th>
                      <th>Name</th> 
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Grade Level</th>
                      <th></th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th> </th>
                      <th> </th>
                      <th></th>
                      
                      <th></th>
                      <th> </th>
                      <th> </th>
                      <th> </th>

                      
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $sql = $classes->selectAllQuery('student');
                    $smt = $classes->selectAll($sql);
                    $cou = 1;
                    while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        $lrn    = $formClass->c($row['studentLrnNum']);
                        $lname  = $formClass->c($row['studentLname']);
                        $fname  = $formClass->c($row['studentFname']);
                        $mname  = $formClass->c($row['studentMname']);
                        $gender = $formClass->c($row['studentGender']);
                        $st     = $formClass->c($row['studentAddSt']);
                        $brgy   = $formClass->c($row['studentAddBrgy']);
                        $muni   = $formClass->c($row['studentAddMunicipality']);
                        $city   = $formClass->c($row['studentAddCity']);
                        $level  = $formClass->c($row['studentLevel']);
                        $studId = $formClass->c($row['studentId']);
                    ?>
                    <tr>
                      <td><?php echo $cou++;?>.</td>
                      <td><?php echo $lrn;?></td>
                      <td><?php echo $lname." ".$fname." ".$mname;?></td>
                     
                      <td><?php echo $gender;?></td>
                      <td><?php echo $st." ".$brgy." ".$muni." ".$city;?></td>
                      <td><?php echo $level;?></td>
                       <td>
                        <form method='post' action='students.php'>
                            <input type='hidden' name='studentId' value='<?php echo $studId;?>'>
                            <input type='hidden' name='name' value='<?php echo $lname." ".$fname." ".$mname;?>'>
                            <input type='hidden' name='lrn' value='<?php echo $lrn;?>'>
                            <input type='hidden' name='level' value='<?php echo $level;?>'>
                            <input type='hidden' name='gender' value='<?php echo $gender;?>'>
                            <button type='submit' class='btn btn-primary' title='manage student info'><i class='fa fa-user-circle '></i> View</button>
                        </form>
                      </td>
                        

                        
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
        <?php echo $formClass->tableFooter();?>        
      </div>
				
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('principalIncludes/footer.php'); ?>


    