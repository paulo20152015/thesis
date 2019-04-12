$(document).ready(function(){
    //location.reload();
    //student login
    $('#buttonStudent').click(function(event){
        event.preventDefault();
        $.ajax({
            url:"php/login.php",
            method:"post",
            data:$('#formStudent').serialize(),
            dataType:"text",
            success:function(data){
               $('#message').text(data);
               if(data == 'student login success'){
                   window.location.href = 'dashboard/studentDashboard/studentDashboard.php';
               }
            }
        });
    });
    
    //register student
    $('#buttonRegister').click(function(event){
        event.preventDefault();
        $.ajax({
            url:"php/login.php",
            method:"post",
            data:$('#studentRegistrationForm').serialize(),
            dataType:"html",
            success: function(data){
                $('#messageRes').html(data);
            }
        });
    });
    
    //parent login
    $('#buttonParent').click(function(event){
        event.preventDefault();
        $.ajax({
            url:"php/login.php",
            method:"post",
            data:$('#parentForm').serialize(),
            dataType:"text",
            success: function(data){
                $('#messageParent').text(data);
                if(data == 'parent login success'){
                    window.location.href = 'dashboard/parentDashboard/parentDashboard.php';
                }
            }
        });
    });
    
    //faculty login
    $('#buttonFaculty').click(function(event){
      
        event.preventDefault();
        $.ajax({
            url:"php/login.php",
            method:"post",
            data:$('#facultyForms').serialize(),
            dataType:"text",
            success:function(data){
                 $('#message1').text(data);
                  if(data == 'clerk login success'){
                   window.location.href = 'dashboard/clerkDashboard/clerkDashboard.php'; 
                    }
                  else if(data =='principal login success'){
                   window.location.href = 'dashboard/principalDashboard/principalDashboard.php'; 
                    }
                    else if(data =='teacher login success'){
                   window.location.href = 'dashboard/teacherDashboard/teacherDashboard.php'; 
                    }
            }
        });
    });
    
});