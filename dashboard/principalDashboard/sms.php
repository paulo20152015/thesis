<?php include_once('principalIncludes/header.php'); ?>
<?php include_once('principalIncludes/navigations.php'); ?>
     <?php 
    
     
     if(isset($_POST['smsText'])){
        if(isset($_POST['title']) && isset($_POST['message'])){
           if(!empty($_POST['title']) && !empty($_POST['message'])){
               $title    = $_POST['title'];
               $message  = $_POST['message']; 
               $sql      = $classes->getOneField('parent','parentContactNum','parentStat'); 
               $smt      = $classes->fetchField($sql,1);
             
               $messageContent = $title." : "
                                 .$message."";
               while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                   $number[] = $row['parentContactNum'];
               }
               
               $result = $smsGateway->sendMessageToManyNumbers($number, $messageContent, $deviceID);
               if($result){
                $mes = '<div class="alert alert-success" role="alert">'
                  .'<strong>SMS will be send to all parents with contact number and active</strong>'
                  .'</div>'; 
               }else{
                  $mes = '<div class="alert alert-danger" role="alert">'
                  .'<strong>ERROR</strong>'
                  .'</div>';                
               }
           }else{
              $mes = '<div class="alert alert-danger" role="alert">'
                  .'<strong>Empty message</strong>'
                  .'</div>';
            }
        }
     }
     ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
            Use this panel to send Notifications to parents.
            <br><i>Note: SMS will be send to all active parents</i> 
        </ol>

        
       
        <div class="row">
            
            <div class="col-lg-3 col-md-3 col-sm-3">
            </div>
              
            <div class="col-lg-6 col-md-6 col-sm-6 ">
             <div class="card mb-3 bg-default">
                 <div class="card-header">
                   <i class="fa fa-envelope-square"></i>
                   SMS Form
                 </div>

                 <div class="card-body ">
                <form method="post" action="sms.php" id="smsForm">
                    <div class="form-group">
                        <label class=""> Title : </label>
                        <input type="text" maxlength="25" name="title" class="form-control" placeholder="Message Title....(max char is 25)" required>
                    </div>
                    <div class="form-group">
                        <label>SMS message: </label>
                        <textarea name="message" placeholder="Compose Message( Max 160 Characters)" class="form-control" maxlength="160" rows="6" required></textarea>
                    </div>
                   <?php echo     $formClass->triggerField('smsText'); ?>
                    <button type="submit" class=" nav-link  btn btn-primary form-control" id="gradesBtn"><i class="fa fa-paper-plane "></i> Send</button>                 
                 </form> 
                 </div>
                 <div class="card-footer small text-muted" id="gradeMes">
                     <?php if(!empty($mes)){echo $mes; } ?>
                 </div>
               </div>
            </div>
              
            <div class="col-lg-3 col-lg-3 col-md-3 col-sm-3">
            </div>

            
        </div>
      
		
			
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include_once('principalIncludes/footer.php'); ?>
    <style>
        textarea {
            resize: none;
        }
    </style>

    

