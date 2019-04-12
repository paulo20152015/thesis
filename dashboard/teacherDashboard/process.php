<?php
include_once('../../php/include.php');


//for updating contact information for teacher
if(isset($_POST['clerkContact'])){
    if(isset($_POST['cnum']) && isset($_POST['id'])){
        $cnum           = $_POST['cnum']; 
        $CurrenUserId   = $_POST['id'];
        if(strlen($cnum) === 11){
            if(strpos($cnum,'0') === 0){
                $sql            = $classes->updateOneQuery('teacher','teacherContact','teacherId');
                $result         = $classes->updateOne($sql,$cnum,$CurrenUserId);
                if($result == true){
                   echo "<div class='alert alert-success' role='alert'>"
                       ."<strong>Contact number has been updated</strong><br>"
                       ."</div>";  
                }else{
                   echo '<div class="alert alert-danger" role="alert">'
                       .'<strong>Update Fail:<br></strong>'
                       .'</div>';
                }
            }else{
               echo '<div class="alert alert-danger" role="alert">'
                   .'<strong>Contact number must have zero at the beginning:<br></strong>'
                   .'</div>';
            }
        }else{
           echo '<div class="alert alert-danger" role="alert">'
               .'<strong>System only accepts 11 digit contact number:<br></strong>'
               .'</div>';
        }
    }
}

//acount setting change pass principal
if(isset($_POST['passwordChange'])){
    if(isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['password3']) && isset($_POST['hash']) && isset($_POST['id'])){
        if(!empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['password3']) && !empty($_POST['hash']) && !empty($_POST['id'])){
               $oldPass       = $_POST['password1'];
               $newPass1      = $_POST['password2'];
               $newPass2      = $_POST['password3'];
               $hash          = $_POST['hash'];
               $CurrenUserId  = $_POST['id'];
               if(password_verify($oldPass, $hash)){
                   if(strlen($newPass1) >=8 && strlen($newPass2 )>=8){
                   if($newPass1 == $newPass2){
                            $hashPass =  $formClass->hash($newPass1);
                            $sql      = $classes->updateOneQuery('accounts','password','teacherId');
                            $result   = $classes->updateOne($sql,$hashPass,$CurrenUserId);
                            if($result == true){
                        echo    "<div class='alert alert-success' role='alert'>"
                        ."<strong>Password updated successfully</strong><br>"
                         . "<a href='logout.php' class='alert-link'>Log-out and try</a>."
                        ."</div>";
                            }else{
                    echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Password updating fail<br></strong>'
                    .'</div>';
                            }   
                   }else{
                 echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>new password does not match <br></strong>'
                    .'</div>';
                   }
                   }else{
                    echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Password must be at least 8 characters long !<br></strong>'
                    .'</div>';
                   } 
               }
               else{
                    echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Incorrect Password !<br></strong>'
                    .'</div>';
               }
         }else{
                      echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Fill out all fields<br></strong>'
                    .'</div>';
         }
    }
}

if(isset($_POST['inputGrade'])){
    if(!empty($_POST['grade']) && !empty($_POST['gradeCategory']) && !empty($_POST['sessionId']) && !empty($_POST['studentId'])){
        $grade     = $_POST['grade'];
        $gradeCat  = $_POST['gradeCategory'];
        $sessionId = $_POST['sessionId'];
        $studentId = $_POST['studentId'];
        if($grade <= 99){
            if($grade <=74 ){ $remarks = 'failed'; }else{ $remarks = 'passed'; }
            $sql       = $classes->selectThreeFilterQuery('grade','sessionId','studentId','gradeCategory');
            $count     = $classes->selectThreeFilter($sql,$sessionId,$studentId,$gradeCat);
            if($count == 0 ){
                if($gradeCat == 2 || $gradeCat == 1 || $gradeCat == 6){
                    $sql    = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                    $result = $classes->insertFive($sql,$sessionId,$studentId,$grade,$gradeCat,$remarks);
                    if($result == true){
                             echo '<div class="alert alert-success" role="alert">'
                            .'<strong>Grade is successfully added<br></strong>'
                            .'</div>';            
                    }else{
                            echo '<div class="alert alert-danger" role="alert">'
                            .'<strong>Failed adding grade<br></strong>'
                            .'</div>';             
                    }       
                }
                if($gradeCat == 3 || $gradeCat == 4 || $gradeCat == 5 || $gradeCat == 7){

                                       if($gradeCat == 3){
                                           $check =2;
                                       }
                                        if($gradeCat == 4){
                                           $check =3;
                                       }
                                        if($gradeCat == 5){
                                           $check =4;
                                       }
                                        if($gradeCat == 7){
                                           $check =6;
                                       }
                $sql       = $classes->selectThreeFilterQuery('grade','sessionId','studentId','gradeCategory');
                $cou       = $classes->selectThreeFilter($sql,$sessionId,$studentId,$check);                                 
                    if($cou == 1){
                    $sql    = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                    $result = $classes->insertFive($sql,$sessionId,$studentId,$grade,$gradeCat,$remarks);
                        if($result == true){
                                 echo '<div class="alert alert-success" role="alert">'
                                .'<strong>Grade is successfully added<br></strong>'
                                .'</div>';            
                        }else{
                                echo '<div class="alert alert-danger" role="alert">'
                                .'<strong>Failed adding grade<br></strong>'
                                .'</div>';             
                        }  
                    }else{
                                echo '<div class="alert alert-danger" role="alert">'
                                .'<strong>Enter previous quarter first<br></strong>'
                                .'</div>';       
                    }  
                }


            }else{
                        echo '<div class="alert alert-danger" role="alert">'
                        .'<strong>This student already has this term or quarter grade<br></strong>'
                        .'</div>';         
            }
        }else{
            echo '<div class="alert alert-danger" role="alert">'
                        .'<strong>Value limit is 99<br></strong>'
                        .'</div>';   
        }
    }else{
                    echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Fill out all fields<br></strong>'
                    .'</div>';       
    }
}

if(isset($_POST['editGrade'])){
    if(!empty($_POST['sessionId']) && !empty($_POST['studentId']) && !empty($_POST['grade']) && !empty($_POST['gradeCat'])){
        $gradeCat  = $_POST['gradeCat'];
        $sessionId = $_POST['sessionId'];
        $studentId = $_POST['studentId'];
        $grade     = $_POST['grade'];
        if($grade <= 99){
            if($grade <=74 ){ $remarks = 'failed'; }else{ $remarks = 'passed'; }
            $sql       = $classes->updateOneThreeFilterQuery('grade','grade','remarks','sessionId','studentId','gradeCategory');
            $result    = $classes->updateOneThreeFilter($sql,$grade,$remarks,$sessionId,$studentId,$gradeCat);   
            if($result == true){
                                        if($gradeCat == 1){
                                           $gradeCat ='Summer';
                                       }
                                        if($gradeCat == 2){
                                           $gradeCat ='First Quarter';
                                       }
                                        if($gradeCat == 3){
                                           $gradeCat ='Second Quarter';
                                       }
                                        if($gradeCat == 4){
                                           $gradeCat ='Third Quarter';
                                       }
                                        if($gradeCat == 5){
                                           $gradeCat ='Fourth Quarter';
                                       }
                                        if($gradeCat == 6){
                                           $gradeCat ='Mid Term';
                                       }
                                        if($gradeCat == 7){
                                           $gradeCat ='Final Term';
                                       }
                        echo '<div class="alert alert-success" role="alert">'
                        .'<strong>'.$gradeCat.' has been updated<br></strong>'
                        .'</div>';           
            }else{
                         echo '<div class="alert alert-danger" role="alert">'
                        .'<strong>Update Fail <br></strong>'
                        .'</div>';      
            }
        }else{
            echo '<div class="alert alert-danger" role="alert">'
                        .'<strong>Value limit is 99 <br></strong>'
                        .'</div>';  
        }
    }else{
                    echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Form error! <br></strong>'
                    .'</div>'; 
    }
}

if(isset($_POST['processSMS'])){
    if(!empty($_POST['gradeCat']) && !empty($_POST['cla'])){
        $classId  = $_POST['cla'];
        $gCat     = $_POST['gradeCat'];
        $sql      = $classes->getClassStudentAndParent();
        $smt      = $classes->fetchField($sql,$classId);
        $i        = 1;
        if($gCat == 1){
          $gradeCat ='Summer';
        }
        if($gCat == 2){
        $gradeCat ='First Quarter';
        }
        if($gCat == 3){
        $gradeCat ='Second Quarter';
        }
        if($gCat == 4){
        $gradeCat ='Third Quarter';
        }
        if($gCat == 5){
        $gradeCat ='Fourth Quarter';
        }
        if($gCat == 6){
        $gradeCat ='Mid Term';
        }
        if($gCat == 7){
        $gradeCat ='Final Term';
        }
        
        while($row = $smt->fetch(PDO::FETCH_ASSOC)){
           $studentId    = $row['studentId'];
           $studentLname = $row['studentLname'];
           $studentFname = $row['studentFname'];
           $studentMname = $row['studentMname'];
           $parentId     = $row['parentId'];
           $pContact     = $row['parentContactNum'];
           
           $message      =  "New Christians Academy notification of grades:".$gradeCat.": Student:".$studentLname." ".$studentFname." ".$studentMname;
           $sql2  = $classes->getStudentGrades();
           $smt2  = $classes->selectThreesReturn($sql2,$studentId,$gCat,$classId);
           while($row2 = $smt2->fetch(PDO::FETCH_ASSOC)){
               $subject = $row2['subjectName'];
               $grade   = $row2['grade'];
               $subject = substr($subject, 0,5);
               $message .= " ".$subject." : ".$grade." "; 
           }
           
           if($smsGateway->sendMessageToNumber($pContact,$message,$deviceID)){
               $sql3   = $classes->checkExistQuery('parent','parentId'); 
               $parent = $classes->fetchUser($sql3,$parentId);
               $parentLname  =  $parent['parentLname'];
               $parentFname  =  $parent['parentFname'];
               $pName = $parentFname." ".$parentLname;
              echo $i++.'. Grade of '.$studentLname." ".$studentFname." was sent to ".$pName.'<br/>';
           }
        }
        
    }
}
//continuation for tommorow is insert and update function for encoding grades
if($_POST['encodegrade']){
  if(!empty($_POST['sesId']) && !empty($_POST['studId'])) { 
      $studId = $_POST['studId'];
      $sesId  = $_POST['sesId'];
    if(isset($_POST['firstq']) && !empty($_POST['firstq'])){
        
        $gradec  = 2;
        $firstq = $formClass->c($_POST['firstq']);
        $valhid = $_POST['first'];
        if(preg_match('/^[0-9]+$/', $firstq)){
            if($firstq <= 74){ $remarks = 'failed'; }else{ $remarks = 'passed';}
            
            if($valhid == 1){
                $sql       = $classes->updateOneThreeFilterQuery('grade','grade','remarks','sessionId','studentId','gradeCategory');
            $result    = $classes->updateOneThreeFilter($sql,$firstq,$remarks,$sesId,$studId,$gradec);
                header("location:subjectStudents.php");
            }else{
                $sql       = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                $result    = $classes->insertFive($sql,$sesId,$studId,$firstq,$gradec,$remarks);
                header("location:subjectStudents.php");
            }
        }
    }
    if(isset($_POST['secondq']) && !empty($_POST['secondq'])){
        
        $gradec  = 3;
        $grade = $formClass->c($_POST['secondq']);
        $valhid = $_POST['second'];
        if(preg_match('/^[0-9]+$/', $grade)){
            if($grade <= 74){ $remarks = 'failed'; }else{ $remarks = 'passed';}
            
            if($valhid == 1){
                $sql       = $classes->updateOneThreeFilterQuery('grade','grade','remarks','sessionId','studentId','gradeCategory');
                $result    = $classes->updateOneThreeFilter($sql,$grade,$remarks,$sesId,$studId,$gradec);
                header("location:subjectStudents.php");
            }else{
                $sql       = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                $result    = $classes->insertFive($sql,$sesId,$studId,$grade,$gradec,$remarks);
                header("location:subjectStudents.php");
            }
        }
    }
    if(isset($_POST['thirdq']) && !empty($_POST['thirdq'])){
        
        $gradec  = 4;
        $grade = $formClass->c($_POST['thirdq']);
        $valhid = $_POST['third'];
        if(preg_match('/^[0-9]+$/', $grade)){
            if($grade <= 74){ $remarks = 'failed'; }else{ $remarks = 'passed';}
            
            if($valhid == 1){
                $sql       = $classes->updateOneThreeFilterQuery('grade','grade','remarks','sessionId','studentId','gradeCategory');
            $result    = $classes->updateOneThreeFilter($sql,$grade,$remarks,$sesId,$studId,$gradec);
                header("location:subjectStudents.php");
            }else{
                $sql       = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                $result    = $classes->insertFive($sql,$sesId,$studId,$grade,$gradec,$remarks);
                header("location:subjectStudents.php");
            }
        }
    }
    if(isset($_POST['fourthq']) && !empty($_POST['fourthq'])){
        
        $gradec  = 5;
        $grade = $formClass->c($_POST['fourthq']);
        $valhid = $_POST['fourth'];
        if(preg_match('/^[0-9]+$/', $grade)){
            if($grade <= 74){ $remarks = 'failed'; }else{ $remarks = 'passed';}
            
            if($valhid == 1){
                $sql       = $classes->updateOneThreeFilterQuery('grade','grade','remarks','sessionId','studentId','gradeCategory');
            $result    = $classes->updateOneThreeFilter($sql,$grade,$remarks,$sesId,$studId,$gradec);
                header("location:subjectStudents.php");
            }else{
                $sql       = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                $result    = $classes->insertFive($sql,$sesId,$studId,$grade,$gradec,$remarks);
                header("location:subjectStudents.php");
            }
        }
    }
    if(isset($_POST['summerq']) && !empty($_POST['summerq'])){
        
        $gradec  = 1;
        $grade = $formClass->c($_POST['summerq']);
        $valhid = $_POST['summer'];
        if(preg_match('/^[0-9]+$/', $grade)){
            if($grade <= 74){ $remarks = 'failed'; }else{ $remarks = 'passed';}
            
            if($valhid == 1){
                $sql       = $classes->updateOneThreeFilterQuery('grade','grade','remarks','sessionId','studentId','gradeCategory');
            $result    = $classes->updateOneThreeFilter($sql,$grade,$remarks,$sesId,$studId,$gradec);
                header("location:subjectStudents.php");
            }else{
                $sql       = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                $result    = $classes->insertFive($sql,$sesId,$studId,$grade,$gradec,$remarks);
                header("location:subjectStudents.php");
            }
        }
    }
    if(isset($_POST['midq']) && !empty($_POST['midq'])){
        
        $gradec  = 6;
        $grade = $formClass->c($_POST['midq']);
        $valhid = $_POST['mid'];
        if(preg_match('/^[0-9]+$/', $grade)){
            if($grade <= 74){ $remarks = 'failed'; }else{ $remarks = 'passed';}
            
            if($valhid == 1){
                $sql       = $classes->updateOneThreeFilterQuery('grade','grade','remarks','sessionId','studentId','gradeCategory');
            $result    = $classes->updateOneThreeFilter($sql,$grade,$remarks,$sesId,$studId,$gradec);
                header("location:subjectStudents.php");
            }else{
                $sql       = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                $result    = $classes->insertFive($sql,$sesId,$studId,$grade,$gradec,$remarks);
                header("location:subjectStudents.php");
            }
        }
    }
    if(isset($_POST['finalq']) && !empty($_POST['finalq'])){
        
        $gradec  = 7;
        $grade = $formClass->c($_POST['finalq']);
        $valhid = $_POST['final'];
        if(preg_match('/^[0-9]+$/', $grade)){
            if($grade <= 74){ $remarks = 'failed'; }else{ $remarks = 'passed';}
            
            if($valhid == 1){
                $sql       = $classes->updateOneThreeFilterQuery('grade','grade','remarks','sessionId','studentId','gradeCategory');
            $result    = $classes->updateOneThreeFilter($sql,$grade,$remarks,$sesId,$studId,$gradec);
                header("location:subjectStudents.php");
            }else{
                $sql       = $classes->insertFiveQuery('grade','sessionId','studentId','grade','gradeCategory','remarks');
                $result    = $classes->insertFive($sql,$sesId,$studId,$grade,$gradec,$remarks);
                header("location:subjectStudents.php");
            }
        }
    }

  }
}   


    
  