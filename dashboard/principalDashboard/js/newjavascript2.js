$(document).ready(function(){
    var string = "addSubject.php";
      
    //updata contact principal
       $('#clerkContactBtn').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#clerkContactForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#clerkContactMes').html(data);
            }
        });
    });
    
    
    //change pass principal
       $('#accountSettingPassBtn').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#clerkChangePassForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#clerkChangePassMes').html(data);
            }
        });
    });
    //adding faculty
       $('#btnAddFaculty').click(function(e){
       e.preventDefault();
       $.ajax({
           url:"process.php",
           method:"post",
           data:$('#addFacultyForm').serialize(),
           dataType:"html",
           success: function(data){
               $('#addFacultyMes').html(data);
           }
           
       });
   });
   
    //faculty update role
       $('#btnRoleTeacher').click(function(e){
       e.preventDefault();
       $.ajax({
           url:"process.php",
           method:"post",
           data:$('#teacherRoleForm').serialize(),
           dataType:"html",
           success: function(data){
               $('#teacherRoleMes').html(data);
               var role =   "<div class='alert alert-success' role='alert'><strong>Faculty role has been updated</strong><br></div>";
               if(data = role){
                   location.reload();
               }
           }
           
       });
   });
   
   
       //faculty reset pass
       $('#btnTeacherReset').click(function(e){
       e.preventDefault();
       $.ajax({
           url:"process.php",
           method:"post",
           data:$('#resetTeacherPass').serialize(),
           dataType:"html",
           success: function(data){
               $('#teacherResetMes').html(data);
           }
           
       });
   });
   
});