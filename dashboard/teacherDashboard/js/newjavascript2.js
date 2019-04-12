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
    
      //change pass teacher
       $('#gradesBtn').click(function(event){ 
        event.preventDefault();
    alert();    
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#gradesForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#gradeMes').html(data);
            }
        });
    });     
   
});