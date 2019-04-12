$(document).ready(function(){
    var string = "addSubject.php";
      
    //updata contact teacher
       $('#teacherContactBtn').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#teacherContactForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#teacherContactMes').html(data);
            }
        });
    });
    
    
    //change pass teacher
       $('#accountSettingPassBtn').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#teacherChangePassForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#teacherChangePassMes').html(data);
            }
        });
    });
    
     //change pass teacher
       $('#btnView').click(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"sched.php",
            method:"post",
            data:$('#syForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#viewMes').html(data);
            }
        });
    });  
    
      //grade teacher
       $('#gradesBtn').click(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradesForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeMes').html(data);
                  location.reload();
            }
        });
    });     
    
          //change pass teacher
       $('#grade1').blur(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradeForm1').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeUpdateMes').html(data);
                 location.reload();
            }
        });
    });
    
              //change pass teacher
       $('#grade2').blur(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradeForm2').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeUpdateMes').html(data);
                 location.reload();
            }
        });
    });
    
              //change pass teacher
       $('#grade3').blur(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradeForm3').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeUpdateMes').html(data);
                 location.reload();
            }
        });
    });
   
             //change pass teacher
       $('#grade4').blur(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradeForm4').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeUpdateMes').html(data);
                 location.reload();
            }
        });
    });
    
              //change pass teacher
       $('#grade5').blur(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradeForm5').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeUpdateMes').html(data);
                 location.reload();
            }
        });
    });
    
              //change pass teacher
       $('#grade6').blur(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradeForm6').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeUpdateMes').html(data);
                 location.reload();
            }
        });
    });
              //change pass teacher
       $('#grade7').blur(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradeForm7').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeUpdateMes').html(data);
                 location.reload();
            }
        });
    });
                    //SEND SMS GRADE
     $('#smsGrade').click(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#smsForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#viewSMSmes').html(data);
            }
        });
    }); 
});