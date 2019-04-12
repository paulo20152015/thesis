$(document).ready(function(){
    var string = "addSubject.php";
      
    //updata contact teacher
       $('#parentContactBtn').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#parentContactForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#parentContactMes').html(data);
                 location.reload();
            }
        });
    });
    
    
    //change pass parent
       $('#accountSettingPassBtn').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#parentChangePassForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#parentChangePassMes').html(data);
            }
        });
    });
    
     //change pass student
     $('#selectMe').change(function(event){ 
        event.preventDefault();
        $.ajax({
            url:"grades.php",
            method:"post",
            data:$('#viewGrades').serialize(),
            dataType:"html",
            success:function(data){
                 $('#viewGradeMes').html(data);
            }
        });
    }); 
    
});