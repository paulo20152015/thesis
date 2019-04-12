<?php
include_once('../../php/include.php');
//adding faculty information
//and account
if(isset($_POST['addFaculty'])){
  $result = $tester->testEmptySixParameters($_POST['fname'],$_POST['mname'],$_POST['lname'],$_POST['contact'],$_POST['gender'],$_POST['role']);
  if($result == true){
      $fname    = $formClass->e($_POST['fname']);
      $mname    = $formClass->e($_POST['mname']);
      $lname    = $formClass->e($_POST['lname']);
      $contact  = $formClass->e($_POST['contact']);
      $gender   = $formClass->e($_POST['gender']);
      $role     = $formClass->e($_POST['role']);
      $sql      = $classes->checkFourFilterQuery('teacher','teacherFname','teacherMname','teacherLname','teacherGender');
      $count    = $classes->checkFourFilter($sql,$fname,$mname,$lname,$gender);
      if(strpos($contact,'0') === 0){
        if(strlen($contact) === 11 ){  
          if($count == 0){         
          $sql      = $classes->insertFiveQuery('teacher','teacherFname','teacherMname','teacherLname','teacherContact','teacherGender');
          $result   = $classes->insertFive($sql,$fname,$mname,$lname,$contact,$gender);
          if($result == true){
            $sql      = $classes->checkFiveFilterQuery('teacher','teacherFname','teacherMname','teacherLname','teacherContact','teacherGender');
            $count    = $classes->checkFiveFilter($sql,$fname,$mname,$lname,$contact,$gender); 
              if($count == 1){
              $row      = $classes->checkFiveFilterRow($sql,$fname,$mname,$lname,$contact,$gender);
              $id       = $row['teacherId'];
              $username = $lname.$fname.rand(0, 3000);
              $pass     = $formClass->hash('12345678');
              $sql      = $classes->insertFourQuery('accounts','teacherId','username','password','role');
              $result   = $classes->insertFour($sql,$id,$username,$pass,$role);
                         if($result == true){
                                echo '<div class="alert alert-success" role="alert">'
                                    .'<strong>Faculty member is added</strong><br>'
                                    ."Account Generated : <br>"
                                    ."Username : ".$username."<br>"  
                                    ."Password : 12345678"      
                                    .'</div>';               
                            }else{
                                echo '<div class="alert alert-success" role="alert">'
                                    .'<strong>Faculty member is added, but failed to generate account</strong>'
                                    .'</div>';
                            }
                }else{
                      echo '<div class="alert alert-success" role="alert">'
                          .'<strong>Faculty member is added, but failed to generate account</strong>'
                          .'</div>';
                }
            }else{
                  echo '<div class="alert alert-danger" role="alert">'
                        .'<strong>Adding faculty member failed !</strong>'
                        .'</div>';
            }
          }else{
                     echo '<div class="alert alert-danger" role="alert">'
                      .'<strong>Faculty member already existed !</strong>'
                      .'</div>';
          }
        }else{
            echo '<div class="alert alert-danger" role="alert">'
                .'<strong>System only accepts 11 digit contact number !</strong>'
                .'</div>';
        }
      }else{
           echo '<div class="alert alert-danger" role="alert">'
                .'<strong>Contact number must start with 0</strong>'
                .'</div>';
      } 
  }else{
                 echo '<div class="alert alert-danger" role="alert">'
                     .'<strong>Please fill out all fields !</strong>'
                     .'</div>';
  }
}

//for updating contact information for principal
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
                    .'<strong>There must be a 0 at the beggining of the contact number:<br></strong>'
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
                   if(strlen($newPass1) >= 8 && strlen($newPass2) >=8){
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
                    .'<strong>Password must be atleast 8 characters long<br></strong>'
                    .'</div>';     
                   }  
               }else{
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


     //role update
    if(isset($_POST['teacherRole'])){
      if(isset($_POST['role'])){
        if(!empty($_POST['id'])){
            $role = $_POST['role'];
              $id = $_POST['id'];
          $sql    = $classes->updateOneQuery('accounts','role','teacherId');
          $result = $classes->updateOne($sql,$role,$id);
             if($result == true){
                  echo    "<div class='alert alert-success' role='alert'>"
                        ."<strong>Faculty role has been updated</strong><br>"
                        ."</div>";           
              }else{
                     echo '<div class="alert alert-danger" role="alert">'
                    .'<strong>Update Error !</strong>'
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
    if(isset($_POST['teacherPassword'])){
 
        if(!empty($_POST['id'])){
            
          $hash = $formClass->hash('12345678');
          $id   = $_POST['id'];
          $sql    = $classes->updateOneQuery('accounts','password','teacherId');
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