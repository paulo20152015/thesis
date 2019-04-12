
   $(document).ready(function(){

   $('#addr').each(function(){ 
       var sizes = $('#addr').length;
       alert(sizes);
   $(this).click(function(e){
       
        e.preventDefault();
        $.ajax({
            url:"addSubject.php",
            method:"post",
            data:$('#manageAddr').serialize(),
            dataType:"text",
            success: function(data){
                $('#manageMes').text(data);
            }
        });
   });
   });
   });