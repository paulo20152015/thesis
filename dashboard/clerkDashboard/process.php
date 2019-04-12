<?php
include_once('../../php/include.php');
     //address update
     if(isset($_POST['address'])){
         if(isset($_POST['city']) && isset($_POST['muni']) && isset($_POST['brgy']) && isset($_POST['st'])){
          if(!empty($_POST['id'])){
              $city = $_POST['city'];
              $muni = $_POST['muni'];
              $brgy = $_POST['brgy'];
              $st = $_POST['st'];
              $id = $_POST['id'];
              $sql    = $classes->updateFourQuery('student','studentAddCity','studentAddMunicipality','studentAddBrgy','studentAddSt','studentId');
              $result = $classes->updateFour($sql,$city,$muni,$brgy,$st,$id);
              if($result == true){
                 echo '<div class="alert alert-success" role="alert">'
                  .'<strong>Updated Successfully !</strong>'
                  .'</div>';
              }else{
                 echo '<div class="alert alert-danger" role="alert">'
                  .'<strong>Update Error/strong>'
                  .'</div>';
              }
          }else{
                   echo '<div class="alert alert-danger" role="alert">'
                  .'<strong>Invalid request</strong>'
                  .'</div>';
          }   
         }
     }
     
     //level update
    if(isset($_POST['level'])){
      if(isset($_POST['gLevel'])){
        if(!empty($_POST['id'])){
          $gLevel = $_POST['gLevel'];
              $id = $_POST['id'];
          $sql    = $classes->updateOneQuery('student','studentLevel','studentId');
          $result = $classes->updateOne($sql,$gLevel,$id);
             if($result == true){
                echo '<div class="alert alert-success" role="alert">'
                  .'<strong>Updated Successfully !</strong>'
                  .'</div>';
              }else{
                 echo '<div class="alert alert-danger" role="alert">'
                  .'<strong>Update Error/strong>'
                  .'</div>';
              }
          }else{
                  echo '<div class="alert alert-danger" role="alert">'
                  .'<strong>Invalid request</strong>'
                  .'</div>';
          }   
         }
     }
    //parent adding 
     if(isset($_POST['parent'])){
         
         if(!empty($_POST['lname']) && !empty($_POST['mname']) && !empty($_POST['fname']) && !empty($_POST['gender']) && !empty($_POST['contact']) && !empty($_POST['rel'])){
         if(!empty($_POST['id'])){
             $fname   = $formClass->c($_POST['lname']);
             $mname   = $formClass->c($_POST['mname']);
             $lname   = $formClass->c($_POST['fname']);
             $contact = $formClass->c($_POST['contact']);
             $rel     = $formClass->e($_POST['rel']);
             $sId     = $formClass->e($_POST['id']);
             $gend    = $formClass->e($_POST['gender']);
             $fname   = strtolower($fname);
             $mname   = strtolower($mname);
             $lname   = strtolower($lname);
             
             $sql     = $classes->checkFourFilterQuery('parent','parentFname','parentMname','parentLname','parentGender');
             $count   = $classes->checkFourFilter($sql,$fname,$mname,$lname,$gend);
             
             if($count == 0){
             $username = $formClass->e($lname.$fname.rand(2000,3999));
             $pass     = $formClass->hash('12345678');
             
             $sql     = $classes->insertParentQuery();
             $result  = $classes->insertParent($sql,$fname,$lname,$mname,$rel,$contact,$gend,$username,$pass);
                if($result == true){
                       $sql    = $classes->stuParQuery();
                       $par    = $classes->stuPar($sql,$fname,$mname,$lname,$contact);
                       $pId    = $par['parentId'];
                       $query  = $classes->insertTwoQuery('studentparent','studentId','parentId');                   
                       $classes->insertTwo($query,$sId,$pId);
                    echo    "<div class='alert alert-success' role='alert'>"
                           ."<strong>Added successfully ! </strong><br> Account Generated : <br>"
                            . "Username : ".$username."<br>"
                            . "Password : 12345678 <br>"
                            . "<a href='student.php' class='alert-link'>Click to reload</a>."
                           ."</div>";

                }else{
                echo '<div class="alert alert-danger" role="alert">'
                     .'<strong>Submision Fail</strong>'
                     .'</div>'; 
                }
             }else{
                 echo '<div class="alert alert-danger" role="alert">'
                     .'<strong>Parent already exist</strong>'
                     .'</div>'; 
             }
             
         }else{
              echo '<div class="alert alert-danger" role="alert">'
                  .'<strong>Form can not be submitted</strong>'
                  .'</div>';
         }
         }else{
             echo '<div class="alert alert-danger" role="alert">'
          .'<strong>Please fill out all fields!</strong> <a href="#" class="alert-link">Fill it out </a> and try submitting again.'
          .'</div>'; 
         }   
     }
     
      //password update
    if(isset($_POST['stuPassword'])){
 
        if(!empty($_POST['id']) && isset($_POST['studentStat'])){
            $studentStat = $_POST['studentStat'];
            if($studentStat == 1){
          $hash = $formClass->hash('12345678');
          $id   = $_POST['id'];
          $sql    = $classes->updateOneQuery('student','studentPassword','studentId');
          $result = $classes->updateOne($sql,$hash,$id);
             if($result == true){
                 echo    "<div class='alert alert-success' role='alert'>"
                        ."<strong>Password Reset Successfully </strong><br>"
                        ."</div>";
              }else{               
                  echo '<div class="alert alert-danger" role="alert">'
                .'<strong>Password Reset Error</strong>'
                .'</div>'; 
              }
            }else{
              echo '<div class="alert alert-danger" role="alert">'
                .'<strong>Error student does not have an account yet</strong>'
                .'</div>'; 
            }  
          }else{
                 echo '<div class="alert alert-danger" role="alert">'
          .'<strong>Invalid Request</strong>'
          .'</div>'; 
          }           
     }
     
     
          // Parent children rel
      if(isset($_POST['relation'])){
          if(!empty($_POST['lrn']) && !empty($_POST['id'])){
              $lrn   = $_POST['lrn'];
              $pId   = $_POST['id'];
              $sql   = $classes->checkExistQuery('student','studentLrnNum');
              $count = $classes->checkExist($sql,$lrn);
            if($count == 0){
                      echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Student does not exist !</strong>'
                    .'</div>';
            }else{
              $sql    = $classes->checkExistQuery('student','studentLrnNum');
              $row    = $classes->fetchUser($sql,$lrn);
              $sId    =  $row['studentId'];
              $sql    = $classes->insertTwoQuery('studentparent','studentId','parentId');
              $result = $classes->insertTwoReturn($sql,$sId,$pId);
              if($result == true){
                 echo    "<div class='alert alert-success' role='alert'>"
                        ."<strong>Student Related Successfully</strong><br>"
                         . "<a href='parent.php' class='alert-link'>Click to reload</a>."
                        ."</div>";
              }else{
                     echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Submission Fail or Student is related already</strong>'
                    .'</div>';
              }
            }  
          }else{
                     echo '<div class="alert alert-danger" role="alert">'
                        .'<strong>Invalid Request !</strong>'
                        .'</div>';
          }
      }
      
     //contact number update
    if(isset($_POST['contactNumber'])){
      if(isset($_POST['cnum'])){
        if(!empty($_POST['id'])){
            $cnum = $_POST['cnum'];
              $id = $_POST['id'];
          if(strlen($cnum) === 11){
              if(strpos($cnum,'0') === 0){
                $sql    = $classes->updateOneQuery('parent','parentContactNum','parentId');
                $result = $classes->updateOne($sql,$cnum,$id);
                   if($result == true){
                      echo "<div class='alert alert-success' role='alert'>"
                          ."<strong>Contact number has been updated</strong><br>"
                          ."</div>";           
                    }else{
                      echo '<div class="alert alert-danger" role="alert">'
                          .'<strong>Update Error !</strong>'
                          .'</div>';
                    }
              }else{
                 echo '<div class="alert alert-danger" role="alert">'
                     .'<strong>Contact number must is start with zero</strong>'
                     .'</div>';
              }   
          }else{
              echo '<div class="alert alert-danger" role="alert">'
                  .'<strong>System only accepts 11 digit contact number</strong>'
                  .'</div>';
          }  
          }else{
                         echo '<div class="alert alert-danger" role="alert">'
                        .'<strong>Invalid Request !</strong>'
                        .'</div>';
          }   
         }
     }
      
     
    //password update
    if(isset($_POST['parPassword'])){
 
        if(!empty($_POST['id'])){
            
          $hash = $formClass->hash('12345678');
          $id   = $_POST['id'];
          $sql    = $classes->updateOneQuery('parent','parentPassword','parentId');
          $result = $classes->updateOne($sql,$hash,$id);
             if($result == true){
                      echo    "<div class='alert alert-success' role='alert'>"
                        ."<strong>Password has been reset</strong><br>"
                        ."</div>";  
                  
              }else{
                         echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Reset Error !</strong>'
                    .'</div>';
              }
             
          }else{
                            echo '<div class="alert alert-danger" role="alert">'
                        .'<strong>Invalid Request !</strong>'
                        .'</div>';
          } 
    }
      
    
    
    
        //admit student
     if(isset($_POST['admit'])){
         if(!empty($_POST['classId']) && !empty($_POST['id']) && !empty($_POST['stuName'])){
              $classId     = $_POST['classId'];
              $studentId   = $_POST['id'];
              
              $sql       = $classes->insertTwoQuery('studentclass','studentId','classId');
              $result    = $classes->insertTwoReturn($sql,$studentId,$classId);
              if($result == true){
                  $sql     = $classes->getClassInfoQuery();
                  $row     = $classes->fetchUser($sql,$classId);
                  $tFname  = $row['teacherFname'];
                  $tMname  = $row['teacherMname'];
                  $tLname  = $row['teacherLname'];
                  $teacher = $tLname." ".$tFname." ".$tMname;
                  $section = $row['sectionName'];
                  $sy      = $row['sy'];
                  $success = 1;
                  $name    = $_POST['stuName'];
                  echo '<div class="alert alert-success" role="alert">';
                  echo $name." has been admitted <br>"
                          ."Class Adviser: ".$teacher."<br>"
                          . "Section : ".$section."<br>"
                          . "School Year : ".$sy."<br>"
                          . "<table class='table table table-bordered' width='100%' cellspacing='0'>"
                          . "<tr>"
                            ."<th>Subject</th>"
                            ."<th>teacher</th>"
                          ."</tr>";
                         if(isset($success)){
                            $sql = $classes->getClassSessionQuery();
                            $res = $classes->selecStudentParent($sql,$classId); 
                             while($row = $res->fetch(PDO::FETCH_ASSOC) ){
                                  $fname  = $row['teacherFname'];
                                  $mname  = $row['teacherMname'];
                                  $lname  = $row['teacherLname'];
                                  $t = $lname." ".$fname." ".$mname;
                                  $subject  = $row['subjectName'];
                               echo "<tr>";
                               echo "<td>".$subject."</td>";
                               echo "<td>".$t."</td>";
                               echo "</tr>";
                             } 
                               echo "</table>"
                             . "</div>";
                           }
                  
              }else{
           
                   echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Admission Error:<br> Request Error or Student is<br> already Admitted to this class</strong>'
                    .'</div>';
              }
         }else{
                    echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Admission Fail:<br></strong>'
                    .'</div>';
         }
     }
     
     
     //for updating contact information for clerk
if(isset($_POST['clerkContact'])){
    if(isset($_POST['cnum']) && isset($_POST['id'])){
        $cnum           = $_POST['cnum']; 
        $CurrenUserId   = $_POST['id'];
        if(strlen($cnum) === 11){
              if(strpos($cnum,'0') === 0){
                    $sql            = $classes->updateOneQuery('teacher','teacherContact','teacherId');
                    $result         = $classes->updateOne($sql,$cnum,$CurrenUserId);
                    if($result == true){
                           echo  "<div class='alert alert-success' role='alert'>"
                                ."<strong>Contact number has been updated</strong><br>"
                                ."</div>";  
                    }else{
                            echo '<div class="alert alert-danger" role="alert">'
                                .'<strong>update fail:<br></strong>'
                                .'</div>';
                    }
                }else{
                     echo '<div class="alert alert-danger" role="alert">'
                         .'<strong>Contact number must is start with zero</strong>'
                         .'</div>';
                 } 
            }else{
              echo '<div class="alert alert-danger" role="alert">'
                  .'<strong>System only accepts 11 digit contact number</strong>'
                  .'</div>';
             }  
        }     
    }


//acount setting change pass clerk
if(isset($_POST['passwordChange'])){
    if(isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['password3']) && isset($_POST['hash']) && isset($_POST['id'])){
        if(!empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['password3']) && !empty($_POST['hash']) && !empty($_POST['id'])){
            
               $oldPass       = $_POST['password1'];
               $newPass1      = $_POST['password2'];
               $newPass2      = $_POST['password3'];
               $hash          = $_POST['hash'];
               $CurrenUserId  = $_POST['id'];
               if(password_verify($oldPass, $hash)){
                   if(strlen($newPass1) >=8 && strlen($newPass2) >=8){
                   
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
                    .'<strong>Password must be at least 8 characters long<br></strong>'
                    .'</div>';
                   }
                   
                   
               }else{
                    echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Incorrect Password !<br></strong>'
                    .'</div>';
               }
         }
         
         else{
                      echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Fill out all fields<br></strong>'
                    .'</div>';
         }
    }
}