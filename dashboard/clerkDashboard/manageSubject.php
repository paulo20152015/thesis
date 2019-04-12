<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
   

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <div class="btn-group" role="group" aria-label="...">
           <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#addSubject1">
                     <i class="fa fa-fw fa-plus-circle "></i>
                     <span class="nav-link-text">
                    Subject Grade 7-10</span>
                    </a>
              
                <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#addSubject2">
                     <i class="fa fa-fw fa-plus-circle "></i>
                    <span class="nav-link-text">
                    Subject Grade 11-12</span>
                     </a>
          </div>
        </ol>

        
       
        <div class="row">
             <!-- grade 1-10 table -->

             <div class="col-lg-12 ">
        <div class="card mb-6">
          <div class="card-header">
            <i class="fa fa-table"></i>
           Subjects for Grade 7-10
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>  
                    <th>Subject</th>
                    <th></th>
                 
                  </tr>
                </thead>
                <tfoot>
                  <tr
                    <th></th>
                    <th></th>
                    <th></th>
                 
                  </tr>
                </tfoot>
                <tbody>
                   <?php 
                          $sql = $classes->fetchSubjectQuery();
                          $smt = $classes->fetchSubject($sql,'LOWER');
                          $cou = 1;
                          while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                              $sId = $formClass->c($row['subjectId']);
                              $sName = $formClass->c($row['subjectName']);
                              $sCode = $formClass->c($row['subjectCode']);
                              ?> 
                        <tr>
                            <td><?php echo $cou++;?>.</td>
                          <td>                           
                              <?php echo $sName;?>              
                          </td>
                          <td>
                              <div class="btn-group">
                             
                                <a class="btn btn-success" data-toggle="modal" data-target="#u1<?php echo $sId;?>">
                                    <i class="fa fa-fw fa fa-pencil-square-o"> </i>
                                   Update
                                  </a>
                             
                                 <a class="btn btn-danger" data-toggle="modal" data-target="#d<?php echo $sId;?>">
                                    <i class="fa fa-fw fa fa-trash-o"> </i>
                                    remove
                                  </a>
                              
                              </div>
                          </td>
                        </tr>
                        <!-- update Modal -->
                        <?php echo $formClass->plainModalHeader('u1'.$sId,'Update'); ?>
                         Your about to update this subject <?php echo $sName;?>
                                 <form method='post' id='manageAddr' action='message.php'>
                                  <fieldset>
                                    <legend> Subject : </legend>
                                      <?php
                                      echo     $formClass->inputFieldSetL('text','Subject Name','subjectName',$sName);                            
                                      echo     $formClass->triggerField('updateSubject');
                                      echo     $formClass->hiddenInput($sId,'subject');
                                      echo     $formClass->hiddenInput($sCode,'subjectCode');
                                      echo     $formClass->submitButton('Update Subject');
                                      ?>
                                  </fieldset>                                   
                                </form>
                        <?php echo $formClass->plainModalFooter(); ?>   
                        <!--end update Modal -->
                        
                         <!-- delete Modal -->
                        <?php echo $formClass->plainModalHeader('d'.$sId,'Confirm Delete'); ?>
                         Your about to delete <?php echo $sName;?>
                           <form method='post' id='manageAddr' action='message.php'>
                            <fieldset>
                               <legend>delete subject : </legend>
                                  <?php
                                  echo     $formClass->triggerField('deleteSubject');
                                  echo     $formClass->hiddenInput($sName,'subjectName');
                                  echo     $formClass->hiddenInput($sId,'subject');
                                  echo     $formClass->submitButton('delete');
                                  ?>
                            </fieldset>                                   
                          </form>
                        <?php echo $formClass->plainModalFooter(); ?>   
                        <!--end delete Modal -->
                          <?php }?>
                 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            
          </div>
        </div>
          </div>
             <hr/>
  
             <hr/>
             <!--second table for grade 11-12-->

             <div class="col-lg-12">
             <div class="card mb-6">
          <div class="card-header">
            <i class="fa fa-table"></i>
           Subjects for Grade 11-12
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="table" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Code</th>
                    <th></th>
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
                          $sql = $classes->notFetchSubjectQuery();
                          $smt = $classes->fetchSubject($sql,'LOWER');
                         $cou = 1;
                          while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                              $sId = $formClass->c($row['subjectId']);
                              $sName = $formClass->c($row['subjectName']);
                              $sCode = $formClass->c($row['subjectCode']);
                              ?> 
                        <tr>
                          <td><?php echo $cou++;?>.</td>
                          <td><?php echo $sName;?></td>
                          <td><?php echo $sCode;?></td>
                         <td>
                              <div class="btn-group">
                           
                                 <a class="btn btn-success" data-toggle="modal" data-target="#u2<?php echo $sId;?>">
                                    <i class="fa fa-fw fa fa-pencil-square-o"> </i>
                                   Update
                                  </a>
                              
                             
                                  <a class="btn btn-danger" data-toggle="modal" data-target="#d<?php echo $sId;?>">
                                    <i class="fa fa-fw fa fa-trash-o"> </i>
                                    remove
                                  </a>
                              
                              </div>
                          </td>
          

                        </tr>
                        <!-- update Modal -->
                        <?php echo $formClass->plainModalHeader('u2'.$sId,'Update'); ?>
                         Your about to update this subject <?php echo $sName;?>
                                <form method='post' id='manageAddr' action='message.php'>
                                  <fieldset>
                                    <legend> Subject : </legend>
                                      <?php
                                      echo     $formClass->inputFieldSetL('text','Subject Name','subjectName',$sName); 
                                      echo     $formClass->inputFieldSetL('text','Subject Code','subjectCode',$sCode);
                                      echo     $formClass->triggerField('updateSubject');
                                      echo     $formClass->hiddenInput($sId,'subject');
                                      echo     $formClass->submitButton('Update Subject');
                                      ?>
                                  </fieldset>                                   
                                </form>
                        <?php echo $formClass->plainModalFooter(); ?>   
                        <!--end update Modal -->
                        <!-- delete Modal -->
                        <?php echo $formClass->plainModalHeader('d'.$sId,'Confirm Delete'); ?>
                         Your about to delete records of <?php echo $sName." ".$sCode;?>
                         <form method='post' id='manageAddr' action='message.php'>
                            <fieldset>
                               <legend>delete subject : </legend>
                                  <?php
                                  echo     $formClass->triggerField('deleteSubject');
                                  echo     $formClass->hiddenInput($sName,'subjectName');
                                  echo     $formClass->hiddenInput($sId,'subject');
                                  echo     $formClass->submitButton('delete');
                                  ?>
                            </fieldset>                                   
                          </form>
                        <?php echo $formClass->plainModalFooter(); ?>   
                        <!--end delete Modal -->
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
    