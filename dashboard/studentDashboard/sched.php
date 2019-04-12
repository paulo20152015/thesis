
<?php 
include_once('../../php/include.php');
if(isset($_POST['category']) && isset($_POST['currentId']) && isset($_POST['sy'])){
   if(!empty($_POST['category']) && !empty($_POST['currentId']) && !empty($_POST['sy'])){

    
       $CurrenUserId = $_POST['currentId'];
       $sy           = $_POST['sy'];
       $cat          = $_POST['category'];
       $sql          = $classes->getStudentSchedQuery();
       $smt          = $classes->selectThreesReturn($sql,$CurrenUserId,$sy,$cat);
    ?>
         <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="">
                         <thead>
                             <tr>
                               <th>Subject </th>
                               <th>Time </th>
                               <th>Day</th>
                               <th>Grade Level </th>
                               <th>Room</th>
                               <th>Floor</th>
                             </tr>
                         </thead>
                         <tfoot>
                           <tr>
                             <th></th>
                             <th></th>
                             <th></th>
                             <th></th>
                             <th></th>
                             <th></th>
                           </tr>
                         </tfoot>
                         <tbody > 
                       <?php
                       while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                           $subject  = $row['subjectName'];
                           $time     = $row['time'];
                           $day      = $row['day'];
                           $level    = $row['gradeLevel'];
                           $room     = $row['roomNum'];
                           $floor    = $row['floorNum'];
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
                            <td><?php echo $subject;  ?></td>
                            <td><?php echo $time;     ?></td>
                            <td><?php echo $day;      ?></td>
                            <td><?php echo $level;    ?></td>
                            <td>No: <?php echo $room; ?></td>
                            <td>No: <?php echo $floor;?></td>
                         </tr>
                       <?php }?>
                    </tbody>
		</table>  
             </div>

    <?php   
   }else{
                    echo '<div class="alert alert-danger alert-dismissible " role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Empty Request !</strong>'
                      .'</div>';
   }
}
?>
