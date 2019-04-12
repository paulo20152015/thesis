<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
<?php 
    if(isset($_POST['sesId']) && isset($_POST['level']) && isset($_POST['section']) && isset($_POST['sy']) && isset($_POST['subject']) && isset($_POST['teacher']) )
            {
        $_SESSION['sesId']   = $_POST['sesId'];
        $_SESSION['section'] = $_POST['section'];
        $_SESSION['sy']      = $_POST['sy'];
        $_SESSION['subject'] = $_POST['subject'];
        $_SESSION['teacher'] = $_POST['teacher'];
        $_SESSION['level']   = $_POST['level'];
        $_SESSION['active']  = $_POST['active'];
        $sesId               = $_SESSION['sesId'];
        $section             = $_SESSION['section'];
        $sy                  = $_SESSION['sy'];
        $active              = $_SESSION['active'];
        $subject             = $_SESSION['subject'];
        $teacher             = $_SESSION['teacher'];
        $level               = $_SESSION['level'];
    }
    else
        {
        $sesId   = $_SESSION['sesId'];
        $section = $_SESSION['section'];
        $sy      = $_SESSION['sy'] ;
        $subject = $_SESSION['subject'];
        $teacher = $_SESSION['teacher'];
        $level   = $_SESSION['level'];
        $active  = $_SESSION['active'];

        }
    //
    if(isset($_POST['schedule'])){
        if(isset($_POST['time1'])&& isset($_POST['time2'])&& isset($_POST['time3'])&& isset($_POST['time4'])&& isset($_POST['time5'])&& isset($_POST['time6'])&& isset($_POST['locationId'])&& isset($_POST['day'])&& isset($_POST['id'])){
        $time    = $_POST['time1'].":".$_POST['time2'] ." ".$_POST['time3'] ."-".$_POST['time4'].":".$_POST['time5'] ." ".$_POST['time6'];
          $id    = $_POST['id'];
         $day    = $_POST['day'];
    $location    = $_POST['locationId'];
         $sql    = $classes->insertFourQuery('schedule','sessionId','time','day','roomId');
         $result = $classes->insertFour($sql,$id,$time,$day,$location);
                   if($result == true){
                    $schedmes = "Added Successfully";
                    }else{
                    $schedmes = "Submission Fail";
                    }
        }
    }
    if(isset($_POST['delete'])){
        if(!empty($_POST['dId'])){
            $id = $_POST['dId'];
            $sql = $classes->deleteQuery('schedule','schedId');
            $result = $classes->delete($sql,$id);
            if($result == true){
                $deleteMes = 'deleted';
             }else{
                $deleteMes = 'Cant Delete';
            }
        }
    }

?>   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          <br><strong>Class Session Information</strong> :<br>
          School Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $sy; ?><br>
          Subject teacher : <?php echo $teacher; ?><br>
          Subject &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $subject; ?><br>
          Grade Level   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $level; ?><br>
          Section &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $section; ?><br>
      </ol>
        
      <div class="row">
            <?php if(isset($active)){
                if($active == 1){
                ?>
          <div class="col-lg-6">

            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-calendar-plus-o "></i>
                 Subject Schedule Form
              </div>
              <div class="card-body">
                    <form method="post" action="schedule.php">
                        
                        <div class='form-group'>
                           <label class='control-label'>Location : </label>	
                             <select name='locationId' class='form-control' required>
                                 <option value="">Select</option>
                               <?php
                               $sql = $classes->selectAllQuery('room');
                               $smt = $classes->selectAll($sql);
                               while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                                  $roomId = $row['roomId'];
                                  $room   = $row['roomNum'];
                                  $floor  = $row['floorNum'];
                               ?>
                                <option value="<?php echo $roomId; ?>"><?php echo "Room no. ".$room." Floor no. ".$floor; ?></option>
                                <?php 
                               }
                                ?>
                             </select>
                              <span class='help-block'></span>
                         </div>
                        
                        <div class="form-group">
                            <label>Day </label>
                            <select class="form-control" name="day" required>day
                                <option value=""></option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thurday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label >Time : </label>
                            
                            <select name="time1" required>
                                <option value="">Hour</opntion>
                                <?php for($val=1;$val <= 12;$val++){?>
                                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                <?php }?>
                            </select>
                            
                            <select name="time2" required>
                                <option value="">Min</opntion>
                                <option value="00">00</option>
                                <option value="05">05</option>
                                <?php for($val=10;$val <= 55;$val+=5){?>
                                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                <?php }?>
                            </select>
                              <select name="time3" required>
  
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                              </select>
                            to 
                            <select name="time4" required>
                                <option value="">Hour</opntion>
                                <?php for($val=1;$val <= 12;$val++){?>
                                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                <?php }?>
                            </select>
                            
                            <select name="time5" required>
                                <option value="">Min</opntion>
                                <option value="00">00</option>
                                <option value="05">05</option>
                                <?php for($val=10;$val <= 55;$val+=5){?>
                                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                <?php }?>
                            </select>
                           <select name="time6" required>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                              </select>
                        </div>
                        

                        
                         <input type="hidden" name="id" value="<?php echo $sesId;?>">
                         
                         <?php echo $formClass->triggerField('schedule');?>
                         <button class="btn btn-success form-control"><i class="fa fa-plus-square fa-lg"></i></button>
                    </form>
                
              </div>
              <div class="card-footer small text-muted">
               <?php if(!empty($schedmes)){
                     echo $schedmes;
                 }?>
              </div>
            </div>
          </div>
                <?php }} ?>
          <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-calendar"></i>
                  Subject Schedule : 
                </div>
                <div class="card-body">
                   <table class='table table-bordered' width='100%' cellspacing='0'>
                          <thead>
                          <tr>
                            <th>Time</th>
                            <th>Day</th>
                            <th>Location</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql   = $classes->getSchedQuery();
                            $result = $classes->selecStudentParent($sql,$sesId);
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                $scId     =   $row['schedId'];
                                $time     =   $row['time'];
                                $day      =   $row['day'];
                                $floor    =   $row['floorNum'];
                                $room     =   $row['roomNum'];
                                if($day == 1){
                                    $day = 'Monday';
                                }
                                 if($day == 2){
                                    $day = 'Tuesday';
                                }
                                if($day == 3){
                                    $day = 'Wednesday';
                                }
                               if($day == 4){
                                    $day = 'Thursday';
                                }
                              if($day == 5){
                                    $day = 'Friday';
                                }
                               if($day == 6){
                                    $day = 'Saturday';
                                }
                                if($day == 7){
                                    $day = 'Sunday';
                                }
                                ?>
                           <tr>
                            <td><?php echo $time; ?></td>
                            <td><?php echo $day; ?></td>
                            <td><?php echo "Room : ".$room."| floor : ".$floor; ?></td>
                            <td>
                                <form method="post" action="schedule.php">
                                    <input type="hidden" name="dId" value="<?php echo $scId;?>">
                                    <?php echo $formClass->triggerField('delete');?>
                                    <button class="btn btn-danger " onclick="return confirm('Are you sure?');"><i class="fa fa-trash "></i></button>
                                </form>
                            </td>
                          </tr>
                            <?php } ?>
                        </tbody>
                  </table>
                </div>
                <div class="card-footer small text-muted">
                    <?php 
                    if(!empty($deleteMes)){
                        echo $deleteMes;
                    }
                    ?>
                </div>
              </div>
          </div>
      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>


    