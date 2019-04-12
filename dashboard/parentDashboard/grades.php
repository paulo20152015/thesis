
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
                               <th>Average</th>
                               <?php } 
                                if($category == 3 || $category == 5){
                               ?>
                               
                               <?php } 
                               if($category == 4){
                               ?>
                               <th>First Quarter</th>
                               <th>Second Quarter</th>
                               <th>Third Quarter</th>
                               <th>Fourth Quarter</th>
                               <th>Average</th>
                               <?php } ?>
                               
                             </tr>
                         </thead>

                         <tbody > 
                              <?php
                                $sql     = $classes->tryGettingSubjectGrade();
                                $smt     = $classes->selectTwoFilter($sql,$stuId,$classId);    

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
                                 $ave = 0;
                                 while($row2 = $smt2->fetch(PDO::FETCH_ASSOC)){
                                      $grade = $row2['grade'];
                                      $total = $ave +=$grade/$count;
                                 ?>
                                 <td><?php echo $grade;?></td>
                                 <?php } ?>
                                 
                               <?php
                               if($category == 1 && $count == 2){
                               ?>
                               <td><?php if(!empty($total)){ echo $total; }?></td>
                               <?php } 
                               if($category == 2 && $count == 2){
                               ?>
                               <td><?php if(!empty($total)){ echo $total; }?></td>
                               <?php } 
                                if($category == 3 || $category == 5){
                               ?>
                               
                               <?php } 
                               if($category == 4 && $count == 4){
                               ?>
                               <td><?php if(!empty($total)){ echo $total; }?></td>
                               <?php } ?>
                             </tr>    
                               <?php } ?>

       
                    </tbody>
		</table>  
             </div>
<?php }} ?>


