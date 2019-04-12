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
 


<!-- start Add teacher Modal -->
             <?php 
                  echo     $formClass->modalHeader('addFaculty','POST','addFacultyForm','Faculty Form');
                  echo     $formClass->inputFieldL('text','First Name','fname'); 
                  echo     $formClass->inputFieldL('text','Middle Name','mname'); 
                  echo     $formClass->inputFieldL('text','Last Name','lname');  
                  echo     $formClass->inputField('number','Contact Number','contact');
                  echo     $formClass->inputGender('Gender','gender');
             ?>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role" required>
                        <option value="clerk">Clerk</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
             <?php
                  echo     $formClass->triggerField('addFaculty');
                  echo     $formClass->modalFooter('btnAddFaculty',' Add','addFacultyMes');
             ?> 
<!-- end Add teacher Modal -->

