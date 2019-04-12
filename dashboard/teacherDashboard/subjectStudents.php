<?php include_once('teacherIncludes/header.php'); ?>
<?php include_once('teacherIncludes/navigations.php'); ?>
  <?php
  //for changing password
                    $row      = $classes->fetchUser($classes->checkExistQuery('accounts','teacherId'),$CurrenUserId);
                    $hash     =    $row['password'];
                    $row      = $classes->fetchUser($classes->checkExistQuery('teacher','teacherId'),$CurrenUserId);
                    $cnumber  =    $row['teacherContact'];
                    
      if(isset($_POST['teacherId']) && isset($_POST['subjectName']) && isset($_POST['sectionName']) && isset($_POST['gradeLevel']) && isset($_POST['categoryName']) && isset($_POST['sy']) 
              && isset($_POST['sessionId']) && isset($_POST['classId'])){
        $_SESSION['subjectName']   = $_POST['subjectName'];
        $_SESSION['sectionName']   = $_POST['sectionName'];
        $_SESSION['gradeLevel']    = $_POST['gradeLevel'];
        $_SESSION['categoryName']  = $_POST['categoryName'];
        $_SESSION['sy']            = $_POST['sy'];
        $_SESSION['sessionId']     = $_POST['sessionId'];
        $_SESSION['classId']       = $_POST['classId'];
        $_SESSION['teacherIdd']    = $_POST['teacherId'];
    
        $subject   = $_SESSION['subjectName'];
        $section   = $_SESSION['sectionName'];
        $grade     = $_SESSION['gradeLevel'];
        $cat       = $_SESSION['categoryName'];
        $sy        = $_SESSION['sy'];
        $sesId     = $_SESSION['sessionId'];
        $classId   = $_SESSION['classId'];
        $teacherId = $_SESSION['teacherIdd'];
    }
    else
        {
        $subject   = $_SESSION['subjectName'];
        $section   = $_SESSION['sectionName'];
        $grade     = $_SESSION['gradeLevel'];
        $cat       = $_SESSION['categoryName'];
        $sy        = $_SESSION['sy'];
        $sesId     = $_SESSION['sessionId'];
        $classId   = $_SESSION['classId'];
        $teacherId = $_SESSION['teacherIdd'];

        }
        
        

  ?>
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
          Subject  &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $subject;?><br>
          Section  &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $section;?><br>
          Grade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : <?php echo $grade;?><br>
          S.Y  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : <?php echo $sy;?><br>
          Category &nbsp;: <?php echo $cat;?><br>
       </ol>
        
      <div class="row">
       
            <!-- students table -->
            <?php echo $formClass->tableHeader('Students','dataTable'); ?>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Lrn</th>
                          <th>Name</th>
                        
                          <?php 
                      if($cat == '1st Semester' || $cat == '2nd Semester'){
                      ?>
                      <th> Mid Term</th>
                      <th> Final Term</th>
                      <?php }
                      if($cat == 'Regular'){
                      ?>
                      <th> First Quarter</th>
                      <th> Second Quarter</th>
                      <th> Third Quarter</th>
                      <th> Fourth Quarter</th>
                      <?php }
                      if($cat == 'Summer'){
                      ?>
                      <th> Summer</th>
                    
                      <?php }?>
                      <th> </th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                      
                            <?php 
                        if($cat == '1st Semester' || $cat == '2nd Semester'){
                        ?>
                          <th>  </th>
                          <th>  </th>
                        <?php }
                        if($cat == 'Regular'){
                        ?>
                          <th>  </th>
                          <th>  </th>
                          <th>  </th>
                          <th>  </th>
                        <?php }
                        if($cat == 'Summer'){
                        ?>
                          <th> </th>

                        <?php }?>
                          <th> </th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        //if(!empty() ){
                            $sql = $classes->getStudentClassSession();
                            $smt = $classes->selectTwoFilter($sql,$classId,$sesId);
                            $cou = 1;
                        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                            $lrn    = $formClass->c($row['studentLrnNum']);
                            $lname  = $formClass->c($row['studentLname']);
                            $fname  = $formClass->c($row['studentFname']);
                            $mname  = $formClass->c($row['studentMname']);
                            $gender = $formClass->c($row['studentGender']);
                            $studId = $formClass->c($row['studentId']);
                            $name   = $lname." ".$fname." ".$mname;
                        ?>
                        <tr>
                          <td><?php echo $cou++;?></td>
                          <td><?php echo $lrn;?></td>
                          <td><?php echo $name?></td>
                        <form method="post" action="process.php">
                          <input type="hidden" name="studId" value="<?php if(isset($studId)){ echo $studId;}?>">
                          <input type="hidden" name="sesId" value="<?php if(isset($sesId)){ echo $sesId;}?>">
                          <!-- <td>
                            <form method='post' action='studentGrades.php'>
                                <input type='hidden' name='studentId' value='<?php// echo $studId;?>'>
                                <input type='hidden' name='name'      value='<?php// echo $name;?>'>
                                <input type='hidden' name='lrn'       value='<?php// echo $lrn;?>'>
                                <input type='hidden' name='sessionId' value='<?php// echo $sesId;?>'>
                                <input type='hidden' name='subject'   value='<?php// echo $subject;?>'>
                                <input type='hidden' name='section'   value='<?php// echo $section;?>'>
                                <input type='hidden' name='sy'        value='<?php// echo $sy;?>'>
                                <input type='hidden' name='category'  value='<?php// echo $cat;?>'>
                                <input type='hidden' name='grade'     value='<?php// echo $grade;?>'>
                                <button type='submit' class='btn btn-primary' title='manage student info'><i class='fa fa-hand-o-right '></i> Grade</button>
                            </form>
                          </td>
                          -->

                        <?php 
                        if($cat == '1st Semester' || $cat == '2nd Semester'){
                            $sqlg    = $classes->getgrades();
                            $mid     = $classes->getgradesreturn($sqlg,$sesId,$studId,6);
                            $midg = $mid['grade'];
                             if(!empty($midg)){
                                $valhid6 = 1;
                            }else{
                                $valhid6 = 0;
                            }
                            $final    = $classes->getgradesreturn($sqlg,$sesId,$studId,7);
                            $finalg   = $final['grade'];
                            if(!empty($finalg)){
                                $valhid7 = 1;
                            }else{
                                $valhid7 = 0;
                            }
                        ?>
                          <td>
                              <input type="hidden" name="mid" value="<?php if(isset($valhid6)){ echo $valhid6;}?>">
                              <input type="number" value="<?php if(!empty($midg)){echo $midg;}?>" name="midq" onKeyUp="if(this.value>100){this.value='';}else if(this.value<0){this.value='0';}" >
                          </td>
                          <td>
                              <input type="hidden" name="final" value="<?php if(isset($valhid7)){ echo $valhid7;}?>">
                              <input type="number" value="<?php if(!empty($finalg)){echo $finalg;}?>" name="finalq" onKeyUp="if(this.value>100){this.value='';}else if(this.value<0){this.value='0';}" >
                          </td>
                        <?php }
                        if($cat == 'Regular'){
                            $sqlg = $classes->getgrades();
                            $g1   = $classes->getgradesreturn($sqlg,$sesId,$studId,2);
                            $firstgrade = $g1['grade'];
                            if(!empty($firstgrade)){
                                $valhid1 = 1;
                            }else{
                                $valhid1 = 0;
                            }
                            $g2   = $classes->getgradesreturn($sqlg,$sesId,$studId,3);
                            $secondgrade = $g2['grade'];
                            if(!empty($secondgrade)){
                                $valhid2 = 1;
                            }else{
                                $valhid2 = 0;
                            }
                            $g3   = $classes->getgradesreturn($sqlg,$sesId,$studId,4);
                            $thirdgrade = $g3['grade'];
                            if(!empty($thirdgrade)){
                                $valhid3 = 1;
                            }else{
                                $valhid3 = 0;
                            }
                            $g4   = $classes->getgradesreturn($sqlg,$sesId,$studId,5);
                            $fourthgrade = $g4['grade'];
                            if(!empty($fourthgrade)){
                                $valhid4 = 1;
                            }else{
                                $valhid4 = 0;
                            }

                            
                        ?>
                          <td>
                              <input type="hidden" name="first" value="<?php if(isset($valhid1)){ echo $valhid1;}?>">
                              <input type="number" value="<?php if(!empty($firstgrade)){echo $firstgrade;}?>" name="firstq" onKeyUp="if(this.value>100){this.value='';}else if(this.value<0){this.value='0';}" >
                          </td>
                          <td>
                              <input type="hidden" name="second" value="<?php if(isset($valhid2)){ echo $valhid2;}?>">
                              <input type="number" value="<?php if(!empty($secondgrade)){echo $secondgrade;}?>" name="secondq" onKeyUp="if(this.value>100){this.value='';}else if(this.value<0){this.value='0';}">
                          </td>
                          <td>
                              <input type="hidden" name="third" value="<?php if(isset($valhid3)){ echo $valhid3;}?>">
                              <input type="number" value="<?php if(!empty($thirdgrade)){echo $thirdgrade;}?>" name="thirdq" onKeyUp="if(this.value>100){this.value='';}else if(this.value<0){this.value='0';}">
                          </td>
                          <td>
                              <input type="hidden" name="fourth" value="<?php if(isset($valhid4)){ echo $valhid4;}?>">
                              <input type="number" value="<?php if(!empty($fourthgrade)){echo $fourthgrade;}?>" name="fourthq" onKeyUp="if(this.value>100){this.value='';}else if(this.value<0){this.value='0';}">
                          </td>
                        <?php }
                        if($cat == 'Summer'){
                            $sqlg    = $classes->getgrades();
                            $gs      = $classes->getgradesreturn($sqlg,$sesId,$studId,1);
                            $summerg = $gs['grade'];
                            if(!empty($summerg)){
                                $valhid5 = 1;
                            }else{
                                $valhid5 = 0;
                            }
                        ?>
                          <input type="hidden" name="summer" value="<?php if(isset($valhid5)){ echo $valhid5;}?>">
                          <td><input type="number" value="<?php if(!empty($summerg)){echo $summerg;}?>" name="summerq" onKeyUp="if(this.value>100){this.value='';}else if(this.value<0){this.value='0';}" ></td>

                        <?php }?>
                          <td>
                              <?php echo $formClass->triggerField('encodegrade');?>
                              <button  type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                          </td>
                         </form>
                        </tr>
                        <?php
                        }
                        //}
                        ?>
                      </tbody>
              </table>
              </div>
            </div>
            <div class='card-footer small text-muted'>
                <?php if(!empty($mes)){echo $mes;}?>
            </div>
          </div>
        </div> 
                      
      </div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('teacherIncludes/footer.php'); ?>
  <style>
      input {
            font-size:14px;
            padding:8px 8px 8px 8px;
            display:block;
            border-bottom:1px solid #757575;
            width:80px;
      }
  </style>

    