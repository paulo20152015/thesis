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
           alert();
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
   
});