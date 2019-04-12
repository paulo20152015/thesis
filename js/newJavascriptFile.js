$(document).ready(function(){
    //location.reload();
    //student login
    $('#buttonStudent').click(function(event){
        event.preventDefault();
        $.ajax({
            url:"php/login.php",
            method:"post",
            data:$('#formStudent').serialize(),
            dataType:"html",
            success:function(data){
               $('#message').html(data);
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
            dataType:"html",
            success: function(data){
                $('#messageParent').html(data);
                if(data == 'parent login success'){
                    window.location.href = 'dashboard/parentDashboard/parentDashboard.php';
                }
            }
        });
    });
    
    var principal = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>principal</strong></div>';
    var clerk = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>clerk</strong></div>';
    var teacher = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>teacher</strong></div>';
    //faculty login
    $('#buttonFaculty').click(function(event){
      
        event.preventDefault();
        $.ajax({
            url:"php/login.php",
            method:"post",
            data:$('#facultyForms').serialize(),
            dataType:"html",
            success:function(data){
                 $('#message1').html(data);
                  if(data == clerk){
                   window.location.href = 'dashboard/clerkDashboard/clerkDashboard.php'; 
                    }
                  else if(data == principal){
                   window.location.href = 'dashboard/principalDashboard/principalDashboard.php'; 
                    }
                    else if(data == teacher){
                   window.location.href = 'dashboard/teacherDashboard/teacherDashboard.php'; 
                    }
            }
        });
    });
    
});