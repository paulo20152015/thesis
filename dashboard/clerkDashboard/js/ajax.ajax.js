
$(document).ready(function(){
    var string = "addSubject.php";
    
    $('#btnSub').click(function(event){
        event.preventDefault();
        $.ajax({
           url:string,
           method:"post",
           data:$('#addSubjectForm').serialize(),
           dataType:"text",
           success: function(data){
               $('#addSubMes').text(data);
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
           }
       });
   });
   //adding class
   
});