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
                 echo     $formClass->modalHeader('addSubject1','POST','addSubjectForm','Subjects for Grade 1-10'); 
                 echo     $formClass->inputField('text','Subject','subject');
                 echo     $formClass->triggerField('addSubject110');
                 echo     $formClass->modalFooter('btnSub','Add Subject','addSubMes');
          ?>
<!-- end Add Subject Modal -->

<!-- start Add Subject Modal -->        
            <?php 
                 echo     $formClass->modalHeader('addSubject2','POST','addSubjectForm2','Subjects for Grade 11-12'); 
                 echo     $formClass->inputField('text','Subject','subject');
                 echo     $formClass->inputField('text','Subject Code','code');      
                 echo     $formClass->triggerField('addSubject1112');
                 echo     $formClass->modalFooter('btnSub2','Add Subject','addSubMes2');
            ?>
<!-- end Add Subject Modal -->

<!-- start Add student Modal -->
             <?php 
                  echo     $formClass->modalHeader('addStudent','POST','addStudentForm',' Add Student Form ');
                  echo     $formClass->inputField('number','LRN','lrn');
                  echo     $formClass->inputField('text','First Name','fname'); 
                  echo     $formClass->inputField('text','Middle Name','mname'); 
                  echo     $formClass->inputField('text','Last Name','lname'); 
                  echo     $formClass->inputGender('Gender','gender'); 
                  echo     $formClass->inputField('text','Address City','city'); 
                  echo     $formClass->inputField('text','Address Municipality','municipality'); 
                  echo     $formClass->inputField('text','Address BRGY','brgy'); 
                  echo     $formClass->inputField('text','Address Street','st');
                  echo     $formClass->triggerField('addStudent');
                  echo     $formClass->modalFooter('btnAddStudent','Add Student','addStuMes');
             ?> 
<!-- end Add student Modal -->

<!-- start Add parent Modal -->
             <?php 
                  echo     $formClass->modalHeader('addParent','POST','addParentForm',' Add Parent Form ');
                  echo     $formClass->inputField('text','First Name','fname'); 
                  echo     $formClass->inputField('text','Middle Name','mname'); 
                  echo     $formClass->inputField('text','Last Name','lname'); 
                  echo     $formClass->inputGender('Gender','gender'); 
                  echo     $formClass->inputField('number','Contact Number','contact'); 
                  echo     $formClass->inputField('text','Username','username'); 
                  echo     $formClass->inputField('password','Password','password'); 
                  echo     $formClass->triggerField('addParent');
                  echo     $formClass->modalFooter('btnAddParent','Add Parent','addParentMes');
             ?> 
<!-- end Add parent Modal -->

<!--start add sy modal-->
<?php 
                  echo     $formClass->modalHeader('addSy','POST','addSyForm','Add School Year ');
                  echo     $formClass->inputField('text','School Year ex: 2017-2018','sy');
                  echo     $formClass->triggerField('addSy');
                  echo     $formClass->modalFooter('btnAddSy','Add SY','addSyMes');
     
?>
<!-- end Add sy Modal -->

<!--start add sy modal-->
<?php 
                  echo     $formClass->modalHeader('addSection','POST','addSectionForm','Add Section');
                  echo     $formClass->inputField('text','Section','section');
                  echo     $formClass->triggerField('addSection');
                  echo     $formClass->modalFooter('btnAddSection','Add Section','addSectionMes');
     
?>
<!-- end Add sy Modal -->

<!-- end modals -->
       