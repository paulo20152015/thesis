$(document).ready(function(){
    var string = "addSubject.php";
    $('#btnAddClass').click(function(event){
        event.preventDefault();
        $.ajax({
            url:string,
            method:"post",
            data:$('#addClassForm').serialize(),
            dataType:"html",
            success: function(data){
                $('#addClassMes').html(data);
                if(data == 'class has been added'){
                    location.reload();
                }
            }
        });
    });
    
    $('#btnAddClass2').click(function(event){
        event.preventDefault();
        $.ajax({
            url:string,
            method:"post",
            data:$('#addClassForm2').serialize(),
            dataType:"html",
            success: function(data){
                $('#addClassMes2').html(data);
              if(data == 'class has been added'){
                    location.reload();
                }
            }
        });
    });
    
    
    $('#btnSub').click(function(event){
        event.preventDefault();
        $.ajax({
           url:string,
           method:"post",
           data:$('#addSubjectForm').serialize(),
           dataType:"text",
           success: function(data){
               $('#addSubMes').text(data);
               
             if(data == 'Subject has been added'){
                 location.reload();
                }
           }
        });
    });
    
    $('#btnSub2').click(function(event){
        event.preventDefault();
        $.ajax({
            url:string,
            method:"post",
            data:$('#addSubjectForm2').serialize(),
            dataType:"text",
            success: function(data){
                $('#addSubMes2').text(data);
              if(data == 'Subject has been added'){
                 location.reload();
                }
            }
        });
    });
    //student adding
    $('#btnAddStudent').click(function(event){
        event.preventDefault();
        $.ajax({
           url:string, 
           method:"post",
           data:$('#addStudentForm').serialize(),
           dataType:"text",
           success: function(data){
               $('#addStuMes').text(data);
                if(data == 'You\'ve successfully added'){
                 location.reload();
                }
           }
        });
    });
   //parent adding
   $('#btnAddParent').click(function(event){
       event.preventDefault();
       $.ajax({
           url:string,
           method:"post",
           data:$('#addParentForm').serialize(),
           dataType:"text",
           success: function(data){
               $('#addParentMes').text(data);
             if(data == 'Added'){
                 location.reload();
                }
           }
       });
   });
   //school year
     $('#btnAddSy').click(function(event){
       event.preventDefault();
       $.ajax({
           url:string,
           method:"post",
           data:$('#addSyForm').serialize(),
           dataType:"text",
           success: function(data){
               $('#addSyMes').text(data);
               if(data == 'School Year has been added'){
                 location.reload();
                }
           }
       });
   });
   //section 
   $('#btnAddSection').click(function(event){
       event.preventDefault();
       $.ajax({
           url:string,
           method:"post",
           data:$('#addSectionForm').serialize(),
           dataType:"text",
           success: function(data){
               $('#addSectionMes').text(data);
                if(data == 'section has been added'){
                    location.reload();
                }
           }
       });
   });
  

  //address update
      $('#btnAddressStudent').click(function(event){
      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#addressForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#addressStudent').html(data);

            }
        });
    });
    
   //updating student level
      $('#btnLevel').click(function(event){
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#levelForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#levelMes').html(data);

            }
        });
    });
    
    //parent adding
       $('#btnParent').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#parentForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#parentMes').html(data);

            }
        });
    });
    
       //student password reset
       $('#btnPassword').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#passReset').serialize(),
            dataType:"html",
            success:function(data){
                 $('#passwordMes').html(data);
            }
        });
    });
  
       //Rel parent student
       $('#btnRel').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#relForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#relMes').html(data);
            }
        });
    });
    
           //contact number parent 
       $('#btnContactParent').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#parentContactForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#parentContactMes').html(data);
            }
        });
    });
    
            //parent reset password
       $('#btnParentReset').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#resetParentPass').serialize(),
            dataType:"html",
            success:function(data){
                 $('#parentResetMes').html(data);
            }
        });
    });
    
    
                //admit student
      // $('#btnAdmit').click(function(event){      
       // event.preventDefault();
       // $.ajax({
         //   url:"process.php",
         //   method:"post",
         //   data:$('#admitForm').serialize(),
         //   dataType:"html",
         //   success:function(data){
         //        $('#admitMes').html(data);
         //   }
      //  });
    //});
    
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
    
    
    
});

