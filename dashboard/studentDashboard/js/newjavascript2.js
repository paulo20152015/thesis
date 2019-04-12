$(document).ready(function(){
    var string = "addSubject.php";
      

    
    
    //change pass student
       $('#accountSettingPassBtn').click(function(event){      
        event.preventDefault();
        $.ajax({
            url:"process.php",
            method:"post",
            data:$('#studentChangePassForm').serialize(),
            dataType:"html",
            success:function(data){
                 $('#studentChangePassMes').html(data);
            }
        });
    });
    
    
         //change pass student
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