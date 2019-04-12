<!-- modals -->
 <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
 
<!-- start Add Subject Modal -->
        <?php 
                 echo     $formClass->modalHeader('addSubject1','POST','addSubjectForm','Subjects for Grade 7-10'); 
                 echo     $formClass->inputFieldL('text','Subject','subject');
                 echo     $formClass->triggerField('addSubject110');
                 echo     $formClass->modalFooter('btnSub',' Add','addSubMes');
          ?>
<!-- end Add Subject Modal -->

<!-- start Add Subject Modal -->        
            <?php 
                 echo     $formClass->modalHeader('addSubject2','POST','addSubjectForm2','Subjects for Grade 11-12'); 
                 echo     $formClass->inputFieldL('text','Subject','subject');
                 echo     $formClass->inputFieldL('text','Subject Code','code');      
                 echo     $formClass->triggerField('addSubject1112');
                 echo     $formClass->modalFooter('btnSub2',' Add','addSubMes2');
            ?>
<!-- end Add Subject Modal -->

<!-- start Add student Modal -->
             <?php 
                  echo     $formClass->modalHeader('addStudent','POST','addStudentForm','Student Form ');
                  echo     $formClass->inputField('number','LRN','lrn');
                  echo     $formClass->inputFieldL('text','First Name','fname'); 
                  echo     $formClass->inputFieldL('text','Middle Name','mname'); 
                  echo     $formClass->inputFieldL('text','Last Name','lname'); 
                  echo     $formClass->inputGender('Gender','gender'); 

                  echo     $formClass->triggerField('addStudent');
                  echo     $formClass->modalFooter('btnAddStudent',' Send','addStuMes');
             ?> 
<!-- end Add student Modal -->

<!-- start Add parent Modal -->
             <?php 
                 /* echo     $formClass->modalHeader('addParent','POST','addParentForm',' Parent Form ');
                  echo     $formClass->inputField('text','First Name','fname'); 
                  echo     $formClass->inputField('text','Middle Name','mname'); 
                  echo     $formClass->inputField('text','Last Name','lname'); 
                  echo     $formClass->inputGender('Gender','gender'); 
                  echo     $formClass->inputField('number','Contact Number','contact'); 
                  echo     $formClass->inputField('text','Username','username'); 
                  echo     $formClass->inputField('password','Password','password'); 
                  echo     $formClass->triggerField('addParent');
                  echo     $formClass->modalFooter('btnAddParent',' Add','addParentMes');
                  
                  */
             ?> 
<!-- end Add parent Modal -->

<!--start add sy modal-->
<?php 
                  echo     $formClass->modalHeader('addSy','POST','addSyForm','School Year Form ');
                  echo     $formClass->inputFieldL('text','School Year','sy');
                  echo      "ex: 2017-2018";
                  echo     $formClass->triggerField('addSy');
                  echo     $formClass->modalFooter('btnAddSy',' Add','addSyMes');
     
?>
<!-- end Add sy Modal -->

<!--start add section modal-->
<?php 
                  echo     $formClass->modalHeader('addSection','POST','addSectionForm','Section Form');
                  echo     $formClass->inputFieldL('text','Section','section');
                  echo     $formClass->triggerField('addSection');
                  echo     $formClass->modalFooter('btnAddSection',' Add','addSectionMes');    
?>

<!-- end Add sy Modal -->

<!--start add class modal-->
<?php 
                  echo     $formClass->modalHeader('addClass','POST','addClassForm','Class for Grade 7-10');
                  
?>
                 <div class='form-group'>
                    <label class='control-label col-lg-6'>Adviser: </label>	
                    <div class='col-lg-12' id='teacher'>
                      <select name='teacher' id='teacher' class='form-control'><option value="">Select</option>
                        <?php
                        $sql = $classes->selectAllQueryAscWithAcitveQuery2();
                        $smt = $classes->selectAll($sql);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['teacherId']; ?>"><?php echo $row['teacherLname']." ".$row['teacherFname']." ".$row['teacherMname']; ?></option>
                         <?php 
                        }
                         ?>
                      </select>
                       <span class='help-block'></span>
                    </div>
                </div>
                


                <div class='form-group'>
                    <label class='control-label col-lg-6'> Grade: </label>	
                    <div class='col-lg-12' id='grade'>
                      <select name='grade' id='grade' class='form-control'><option value="">Select</option>
                        <?php
                        $sql = $classes->checkExistQuery('gradelevel','level');
                        $smt = $classes->selectAllFilter($sql,1);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['gradeLevelId']; ?>"><?php echo $row['gradeLevel']; ?></option>
                         <?php 
                        }
                         ?>
                      </select>
                       <span class='help-block'></span>
                    </div>
                </div>


                <div class='form-group'>
                    <label class='control-label col-lg-6'> School Year: </label>	
                    <div class='col-lg-12' id='sy'>
                      <select name='sy' id='sy' class='form-control'><option value="">Select</option>
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
                       <span class='help-block'></span>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-lg-6'> Section: </label>	
                    <div class='col-lg-12' id='section'>
                      <select name='section' id='section' class='form-control'><option value="">Select</option>
                        <?php
                        $sql = $classes->selectAllQuery('section');
                        $smt = $classes->selectAll($sql);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['sectionId']; ?>"><?php echo $row['sectionName']; ?></option>
                         <?php 
                        }
                         ?>
                      </select>
                       <span class='help-block'></span>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-lg-6'> Category: </label>	
                    <div class='col-lg-12' id='grade'>
                      <select name='category' id='category' class='form-control'><option value="">Select</option>
                        <?php
                        $sql = $classes->checkExistQuery('category','categoryLevel');
                        $smt = $classes->selectAllFilter($sql,1);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>
                         <?php 
                        }
                         ?>
                      </select>
                       <span class='help-block'></span>
                    </div>
                </div>


                  
<?php
                  echo     $formClass->triggerField('addClass');
                  echo     $formClass->modalFooter('btnAddClass',' Add','addClassMes');
     
?>
<!-- end Add class Modal -->

<!--start add class modal-->
<?php 
                  echo     $formClass->modalHeader('addClass2','POST','addClassForm2','Class for Grade 11-12');
                  
?>
                 <div class='form-group'>
                    <label class='control-label col-lg-6'>Adviser: </label>	
                    <div class='col-lg-12' id='teacher'>
                      <select name='teacher' id='teacher' class='form-control'><option value="">Select</option>
                        <?php
                        $sql = $classes->selectAllQueryAscWithAcitveQuery2();
                        $smt = $classes->selectAll($sql);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['teacherId']; ?>"><?php echo $row['teacherLname']." ".$row['teacherFname']." ".$row['teacherMname']; ?></option>
                         <?php 
                        }
                         ?>
                      </select>
                       <span class='help-block'></span>
                    </div>
                </div>
                


                <div class='form-group'>
                    <label class='control-label col-lg-6'> Grade: </label>	
                    <div class='col-lg-12' id='grade'>
                      <select name='grade' id='grade' class='form-control'><option value="">Select</option>
                        <?php
                        $sql = $classes->checkExistQuery('gradelevel','level');
                        $smt = $classes->selectAllFilter($sql,2);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['gradeLevelId']; ?>"><?php echo $row['gradeLevel']; ?></option>
                         <?php 
                        }
                         ?>
                      </select>
                       <span class='help-block'></span>
                    </div>
                </div>


                <div class='form-group'>
                    <label class='control-label col-lg-6'> School Year: </label>	
                    <div class='col-lg-12' id='sy'>
                      <select name='sy' id='sy' class='form-control'><option value="">Select</option>
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
                       <span class='help-block'></span>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-lg-6'> Section: </label>	
                    <div class='col-lg-12' id='section'>
                      <select name='section' id='section' class='form-control'><option value="">Select</option>
                        <?php
                        $sql = $classes->selectAllQuery('section');
                        $smt = $classes->selectAll($sql);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['sectionId']; ?>"><?php echo $row['sectionName']; ?></option>
                         <?php 
                        }
                         ?>
                      </select>
                       <span class='help-block'></span>
                    </div>
                </div>


                <div class='form-group'>
                    <label class='control-label col-lg-6'> Category: </label>	
                    <div class='col-lg-12' id='grade'>
                      <select name='category' id='category' class='form-control'><option value="">Select</option>
                        <?php
                        $sql = $classes->checkExistQuery('category','categoryLevel');
                        $smt = $classes->selectAllFilter($sql,2);
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                         <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>
                         <?php 
                        }
                         ?>
                      </select>
                       <span class='help-block'></span>
                    </div>
                </div>

                  
<?php
                  echo     $formClass->triggerField('addClass2');
                  echo     $formClass->modalFooter('btnAddClass2',' Add','addClassMes2');
     
?>
<!-- end Add class Modal -->

<!-- end modals -->
       