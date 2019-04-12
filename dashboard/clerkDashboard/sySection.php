<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
  <?php 
    if(isset($_POST['acti'])){
        if(isset($_POST['activate'])){
            $activeStat = $_POST['stat'];
            $activeId = $_POST['activate']; 
            if($activeStat == 1){
                $activeStat = 0;
            }else{
                $activeStat = 1;
            }
            $sql    = $classes->updateOneQuery('schoolyear','active','syId');
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
                    <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#addSy">
                        <i class="fa fa-fw fa-plus-circle "></i>
                        <span class="nav-link-text">
                        School Year</span>
                    </a>    
                </div>
                <div class="btn-group" role="group" aria-label="...">
                    <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#addSection">
                        <i class="fa fa-fw fa-plus-circle "></i>
                        <span class="nav-link-text">
                        Section</span>
                    </a>    
                </div>
            </ol>
            <ol class="breadcrumb">
                <?php if(!empty($actiMes)){
                     echo $actiMes;
                 }?>
            </ol>
            
        <div class="row">

             <div class="col-lg-12">
             <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
           School Year
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>School Year </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                   <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                   <?php
                        $sql = $classes->selectAllQuery('schoolyear');
                        $smt = $classes->selectAll($sql);
                        $cou = 1;
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                            $i  = $row['active'];
                            $id = $row['syId'];
                        ?>
                        <tr>
                           <td><?php echo $cou++;?>.</td>
                           <td><?php echo $row['sy'];?></td>
                           <td>
                             <div class="btn-group">  
                           <?php if($i == 0){?>
                           
                             <form method='post' action='sySection.php'>
                                <input type='hidden' name='stat' value='<?php echo $i;?>'>
                                <input type='hidden' name='activate' value='<?php echo $id;?>'>
                                <?php echo $formClass->triggerField('acti');?>
                                <button type='submit' class='btn btn-primary' title='Set as active'><i class='fa fa-fw fa-toggle-off '></i> Inactive</button>
                             </form>
                           
                           <?php }else{ ?>
                            
                             <form method='post' action='sySection.php'>
                                <input type='hidden' name='stat' value='<?php echo $i;?>'>
                                <input type='hidden' name='activate' value='<?php echo $id;?>'>
                                <?php echo $formClass->triggerField('acti');?>
                                <button type='submit' class='btn btn-primary' title='Set as inactive'><i class='fa fa-fw fa-toggle-on'></i> Active</button>
                             </form>
                           
                           <?php
                           }
                           ?>
                             <form method="post" action="message.php">
                                 <input type="hidden" name="syId" value="<?php echo $id;?>">
                                 <?php echo $formClass->triggerField('deleteSy');?>
                                 <button class="btn btn-danger" onclick="return confirm('Are you sure?');" type="submit" title="Delete School year"><i class="fa fa-trash"></i></button>
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
            
            <div class="col-lg-12">
             <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
           Section
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="table" cellspacing="0">
                <thead>
                  <tr>
                    <th>Section </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                   <tr>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                   <?php
                        $sql = $classes->selectAllQuery('section');
                        $smt = $classes->selectAll($sql);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                            $secId = $row['sectionId'];
                            $sname = $row['sectionName'];
                        ?>
                        <tr>
                         
                           <td><?php echo $sname;?></td>
                           <td>
                               <div class="btn-group">
                                
                                 <button class="btn btn-primary" data-toggle="modal" data-target="#sec<?php echo $secId;?>">
                                 <i class="fa fa-fw fa fa-pencil-square-o"> </i>
                                   Update
                                 </button>
                                   
                                <form method="post" action="message.php">
                                    <input type="hidden" name="secId" value="<?php echo $secId;?>">
                                    <?php echo $formClass->triggerField('deleteSection');?>
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?');" type="submit" title="Delete Section"><i class="fa fa-trash"></i></button>
                                </form>
                                   
                               </div>
                           </td>
                           
                        </tr>
                        <!-- update Modal -->
                        <?php echo $formClass->plainModalHeader('sec'.$secId,'Update'); ?>
                         Your about to update this Section <?php echo $sName;?>
                                 <form method='post' id='manageAddr' action='message.php'>
                                  <fieldset>
                                    <legend> Section : </legend>
                                      <?php
                                      echo     $formClass->inputFieldSetL('text','Section','sectionName',$sname);                            
                                      echo     $formClass->triggerField('updateSection');
                                      echo     $formClass->hiddenInput($secId,'sectionId');
                                      echo     $formClass->submitButton('Update Section');
                                      ?>
                                  </fieldset>                                   
                                </form>
                        <?php echo $formClass->plainModalFooter(); ?>   
                        <!--end update Modal -->
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
    