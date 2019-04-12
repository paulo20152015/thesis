
<?php 
include_once('../../php/include.php');
if(isset($_POST['cId']) && isset($_POST['id'])){
    if(!empty($_POST['cId']) && !empty($_POST['id'])){
                $stuId    = $_POST['id'];
                $classId  = $_POST['cId'];
                $sql      = $classes->checkExistQuery('class','classId');
                $class    = $classes->fetchUser($sql,$classId);
                $category = $class['categoryId'];

    ?>
         <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="">
                         <thead>
                             <tr>
                               <th>Subject</th>
                               <?php
                               if($category == 1 || $category == 2){
                               ?>
                               <th>Mid Term</th>
                               <th>Final Term</th>
                               <th>Subject Grade Ave</th>
                               <?php } 
                                if($category == 3 || $category == 5){
                               ?>
                               <th>Summer</th>
                               <?php } 
                               if($category == 4){
                               ?>
                               <th>First Quarter</th>
                               <th>Second Quarter</th>
                               <th>Third Quarter</th>
                               <th>Fourth Quarter</th>
                               <th>Subject Grade Ave</th>
                               <?php } ?>
                               
                             </tr>
                         </thead>

                         <tbody > 
                              <?php
                                $sql      = $classes->tryGettingSubjectGrade();
                                $smt      = $classes->selectTwoFilter($sql,$stuId,$classId);    
                                $counting1 = 0;
                                $counting2 = 0;
                                $counting3 = 0;
                                $counting4 = 0;
                                $tave1  = 0;
                                $tave2  = 0;
                                $tave3  = 0;
                                $tave4  = 0;
                                $total1 = 0;
                                $total2 = 0;
                                $total3 = 0;
                                $total4 = 0;
                              while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                                  $subject  = $row['subjectName'];
                                  $sessionI = $row['sessionId'];
                              ?>
                             <tr>
                                 <td><?php echo $subject; ?></td>
                                 <?php 
                                 $sql2  = $classes->gettingSubjectGrade();
                                 $smt2  = $classes->selectTwoFilter($sql2,$sessionI,$stuId);
                                 $count = $classes->selectTwoFilterCount($sql2,$sessionI,$stuId);
                                 $ave   = 0;
                                
                                 while($row2 = $smt2->fetch(PDO::FETCH_ASSOC)){
                                      $grade = $row2['grade'];
                                      
                                      $total = $ave +=$grade/$count;
                                 ?>
                                 <td class="<?php if($grade <= 74){echo 'bg-danger'; } ?>"><?php echo $grade;?></td>
                                 <?php } ?>
                                 
                                <?php
                                if($category == 1 && $count == 2){
                                ?>
                                <td><?php if(!empty($total)){ echo intval($total); }?></td>
                                <?php } 
                                if($category == 2 && $count == 2){
                                ?>
                                <td><?php if(!empty($total)){ echo intval($total); }?></td>
                                <?php } 
                                 if($category == 3 || $category == 5){
                                ?>

                                <?php } 
                                if($category == 4 && $count == 4){
                                ?>
                                <td><?php if(!empty($total)){ echo intval($total); }?></td>
                                <?php } ?>
                             </tr>    
                               <?php } ?>

       
                    </tbody>
                         <tfoot>
                             <tr>
                               <th>Average</th>
                               <?php
                               ////////////////////////////
                               if($category == 1 || $category == 2){
                                $sql = $classes->getgradesperquarterquery();
                                $smt1 = $classes->getgradesperquarter($sql,$stuId,$classId,6); 
                                while($row = $smt1->fetch(PDO::FETCH_ASSOC)){
                                    $counting1++;
                                    $total1 += $row['grade'];
                                }
                                $tave1 = intval($total1/$counting1);
                                $smt2 = $classes->getgradesperquarter($sql,$stuId,$classId,7);
                                 while($row = $smt2->fetch(PDO::FETCH_ASSOC)){
                                    $counting2++;
                                    $total2 += $row['grade'];
                                }
                                $tave2 = intval($total2/$counting2);
                               ?>
                               <th><?php if(isset($total1)){ echo $tave1;}?></th>
                               <th><?php if(isset($total2)){ echo $tave2;}?></th>
                               <th></th>
                               <?php } 
                               ////////////////////////////////
                                if($category == 3 || $category == 5){
                                $sql = $classes->getgradesperquarterquery();
                                $smt1 = $classes->getgradesperquarter($sql,$stuId,$classId,1); 
                                while($row = $smt1->fetch(PDO::FETCH_ASSOC)){
                                    $counting1++;
                                    $total1 += $row['grade'];
                                }
                                $tave1 = intval($total1/$counting1);
                               ?>
                               <th><?php if(isset($total1)){ echo $tave1;}?></th>
                               <?php } 
                               ////////////////////////////
                               if($category == 4){
                                $sql = $classes->getgradesperquarterquery();
                                $smt1 = $classes->getgradesperquarter($sql,$stuId,$classId,2); 
                                while($row = $smt1->fetch(PDO::FETCH_ASSOC)){
                                    $counting1++;
                                    $total1 += $row['grade'];
                                }
                                $tave1 = intval($total1/$counting1);
                                $smt2 = $classes->getgradesperquarter($sql,$stuId,$classId,3);
                                 while($row = $smt2->fetch(PDO::FETCH_ASSOC)){
                                     $counting2++;
                                    $total2 += $row['grade'];
                                }
                                $tave2 = intval($total2/$counting2);
                                 $smt3 = $classes->getgradesperquarter($sql,$stuId,$classId,4);
                                 while($row = $smt3->fetch(PDO::FETCH_ASSOC)){
                                     $counting3++;
                                    $total3 += $row['grade'];
                                }
                                $tave3 = intval($total3/$counting3);
                                 $smt4 = $classes->getgradesperquarter($sql,$stuId,$classId,5);
                                 while($row = $smt4->fetch(PDO::FETCH_ASSOC)){
                                     $counting4++;
                                    $total4 += $row['grade'];
                                }
                                $tave4 = intval($total4/$counting4);
                               ?>
                               <th><?php if(isset($total1)){ echo $tave1;}?></th>
                               <th><?php if(isset($total2)){ echo $tave2;}?></th>
                               <th><?php if(isset($total3)){ echo $tave3;}?></th>
                               <th><?php if(isset($total4)){ echo $tave4;}?></th>
                               <th></th>
                               <?php } ?>
                               
                             </tr>
                         </tfoot>
		</table>  
             </div>
<?php }} ?>


