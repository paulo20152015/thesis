$(document).ready(function(){
    var string = "addSubject.php";
      
    //updata contact clerk
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
    
    
    //change pass clerk
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
           dataType:"text",
           success: function(data){
               $('#addFacultyMes').text(data);
           }
           
       });
   });
});


