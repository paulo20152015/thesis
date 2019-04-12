<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
   <?php
   if(isset($_POST['acti'])){
        if(isset($_POST['activate'])){
            $activeStat = $_POST['stat'];
            $activeId   = $_POST['activate']; 
            if($activeStat == 1){
                $activeStat = 0;
            }else{
                $activeStat = 1;
            }
            $sql    = $classes->updateOneQuery('parent','parentStat','parentId');
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
                
            </ol>
        <div class="row">

             <div class="col-lg-12">
             <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
           Parents
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="table" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NAME </th>
                    <th>GENDER </th>
                    <th>Contact Number </th>
                    <th></th>
                   <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>NAME </th>
                    <th>GENDER </th>
                    <th>Contact Number </th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                   <?php
                        $sql = $classes->selectAllQuery('parent');
                        $smt = $classes->selectAll($sql);
                        $cou =1;
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                            $lname   = $row['parentLname'];
                            $fname   = $row['parentFname'];
                            $mname   = $row['parentMname'];
                            $gender  = $row['parentGender'];
                            $contact = $row['parentContactNum'];
                            $pId     = $row['parentId'];
                            $i       = $row['parentStat'];
                            
                        ?>
                        <tr>
                         <td><?php echo $cou++;?>.</td>
                          <td><?php echo $lname." ".$fname." ".$mname;?></td>
                        
                          <td><?php echo $gender;?></td>
                           <td><?php echo $contact;?></td>
                  
                          <td>
                            <form method='post' action='parent.php'>
                            <input type='hidden' name='parentId' value='<?php echo $pId;?>'>
                            <button type='submit' class='btn btn-primary' title='manage student info'><i class='fa fa-fw fa-cog'></i> Account</button>
                            </form>    
                          </td>
 
                           <?php if($i == 0){?>
                           <td>
                             <form method='post' action='manageParent.php'>
                                <input type='hidden' name='stat' value='<?php echo $i;?>'>
                                <input type='hidden' name='activate' value='<?php echo $pId;?>'>
                                <?php echo $formClass->triggerField('acti');?>
                                <button type='submit' class='btn btn-primary' title='Set as active'><i class='fa fa-fw fa-toggle-off '></i> Inactive</button>
                             </form>
                           </td>
                           
                           <?php }else{ ?>
                            <td>
                             <form method='post' action='manageParent.php'>
                                <input type='hidden' name='stat' value='<?php echo $i;?>'>
                                <input type='hidden' name='activate' value='<?php echo $pId;?>'>
                                <?php echo $formClass->triggerField('acti');?>
                                <button type='submit' class='btn btn-primary' title='Set as inactive'><i class='fa fa-fw fa-toggle-on'></i> Active</button>
                             </form>
                           </td>
                           <?php
                           }
                           ?>
                           
                               

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
    