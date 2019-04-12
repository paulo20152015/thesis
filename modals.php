<!--modal for student login-->
	<?php 
             echo $formClass->modalHeader('modal-1','POST','formStudent','Student Login'); 
             echo $formClass->inputField('text','Username','username'); 
             echo $formClass->inputField('password','Password','password');
             echo $formClass->tokenField();
             echo $formClass->triggerField('studentForm');
             echo $formClass->modalFooter('buttonStudent','Login','message');
             ?>			
<!--end of modal for student login-->


<!--modal for faculty login-->
        <?php 
             echo $formClass->modalHeader('modal-2','POST','facultyForms','Faculty Login'); 
             echo $formClass->inputField('text','Username','username'); 
             echo $formClass->inputField('password','Password','password');
             echo $formClass->tokenField();
             echo $formClass->triggerField('facultyForm');
             echo $formClass->modalFooter('buttonFaculty','Login','message1');
             ?>	
<!--end of modal for faculty login-->

<!--modal for student registration-->
        <?php 
             echo $formClass->modalHeader('modal-4','POST','studentRegistrationForm','Student Registration'); 
             echo $formClass->inputField('text','Username','username'); 
             echo $formClass->inputField('number','LRN','lrn'); 
             echo $formClass->inputField('password','Password','password');
             echo $formClass->inputField('password','Confirm Password','password2');
             echo $formClass->tokenField();
             echo $formClass->triggerField('registerForm');
             echo $formClass->modalFooter('buttonRegister','Register','messageRes');
             ?>	
 <!--end of modal for student registration-->
				

<!--modal for Parent-->

        <?php 
             echo $formClass->modalHeader('modal-5','POST','parentForm','Parent Login'); 
             echo $formClass->inputField('text','Username','username'); 
             echo $formClass->inputField('password','Password','password');
             echo $formClass->tokenField();
             echo $formClass->triggerField('parentForm');
             echo $formClass->modalFooter('buttonParent','Login','messageParent');
             ?>	
 <!--end of modal for parent-->

				
				
				
			


