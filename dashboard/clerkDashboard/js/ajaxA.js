$(document).ready(function(){
    var string = "addSubject.php";
    $('#btnAddClass').click(function(event){
        event.preventDefault();
        $.ajax({
            url:string,
            method:"post",
            data:$('#addClassForm').serialize(),
            dataType:"text",
            success: function(data){
                $('#addClassMes').text(data);
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
            dataType:"text",
            success: function(data){
                $('#addClassMes2').text(data);
              if(data == 'class has been added'){
                    location.reload();
                }
            }
        });
    });

});

