<?php
include_once('include.php');
$message= array();
  
  /*for faculty*/
   if(isset($_POST['facultyForm']))
      {
      if(!empty($_POST['username']) && !empty($_POST['password']))
      {
          //filtered username
          $username     = $formClass->e($_POST['username']);
          $count        = $classes->checkExist( $classes->checkExistQuery('accounts','username'),$username);
          if($count<1){
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Account does not exist! </strong>'
                      .'</div>';
          }
          else
          {
              $row = $classes->fetchUser($classes->checkExistQuery('accounts','username'),$username);
              if(password_verify($_POST['password'], $row['password'])){
                    $id         =   $row['teacherId'];
                    $pass       =   $row['password'];
                    $role       =   $row['role'];
                    $username   =   $row['username'];
                    //select user data
                    $row = $classes->fetchUser($classes->checkExistQuery('teacher','teacherId'),$id);
                    $_SESSION['teacherId']        =    $row['teacherId'];
                    $_SESSION['teacherfname']     =    $row['teacherFname'];
                    $_SESSION['teacherMname']     =    $row['teacherMname'];
                    $_SESSION['teacherLname']     =    $row['teacherLname'];
                    $_SESSION['teacherToken']     =    $_POST['token'];
                    $_SESSION['teacherRole']      =    $role;
                    $_SESSION['teacherUsername']  =    $username;
                                 
                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>'.$role.'</strong>'
                      .'</div>';
              }
              else
              {
                        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Password is Incorrect! </strong>'
                      .'</div>';
              }
          }
      }
      else
      {
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Please fill out all fields</strong>'
                      .'</div>';
      }
      }
  else
  {
   
  }
  /*end*/

  //student login
  if(isset($_POST['studentForm']))
  {
      if(isset($_POST['username']) && isset($_POST['password'])){
          if(!empty($_POST['username']) && !empty($_POST['password'])){
              $username    =   $_POST['username'];
              $sql         =   $classes->checkExistQuery('student','studentUsername');
              $count       =   $classes->checkExist($sql,$username);
              if($count == 0){
                  echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Account does not exist! </strong>'
                      .'</div>';
              }
              else
              {
                  //next is password veridication
                  $row = $classes->fetchUser($sql,$username);
                  if(password_verify($_POST['password'], $row['studentPassword'])){
                    $_SESSION['studentId']     =    $row['studentId'];
                    $_SESSION['studentFname']  =    $row['studentFname'];
                    $_SESSION['studentMname']  =    $row['studentMname'];
                    $_SESSION['studentLname']  =    $row['studentLname'];
                    $_SESSION['studentUsername']  =    $row['studentUsername'];
                    $_SESSION['studentToken']  =    $_POST['token'];
                    echo 'student login success';
                  }
                  else
                  {
                      echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Incorrect password! </strong>'
                      .'</div>';
                  }
              }
          }
          else
          {
                      echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Please fill out all fields! </strong>'
                      .'</div>';
          }
      }
  }
    /*end*/
  
  //parent login
  if(isset($_POST['parentForm']))
  {
   if(isset($_POST['username']) && isset($_POST['password'])){
       if(!empty($_POST['username']) && !empty($_POST['password'])){
           $username = $formClass->e($_POST['username']);
           $password = $formClass->e($_POST['password']);
           $sql      = $classes->checkExistQuery('parent','parentUsername');
           $count    = $classes->checkExist($sql,$username); 
           if($count == 0){
                          echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Account does not exist! </strong>'
                      .'</div>';
           }
           else
           {
               $row  = $classes->fetchUser($sql,$username);
               if(password_verify($password, $row['parentPassword'])){
                    $_SESSION['parentId']     =    $row['parentId'];
                    $_SESSION['parentFname']  =    $row['parentFname'];
                    $_SESSION['parentUsername']  =    $row['parentUsername'];
                    $_SESSION['parentMname']  =    $row['parentMname'];
                    $_SESSION['parentLname']  =    $row['parentLname'];
                    $_SESSION['parentToken']  =    $_POST['token'];
                   echo 'parent login success';
               }
               else
               {
                          echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Password is incorrect! </strong>'
                      .'</div>';
               }
           }
       }
       else
       {
                          echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Please fill out all fields! </strong>'
                      .'</div>';
       }
   }   
  }
   /*end*/

//registration
  if(isset($_POST['registerForm']))
  {
   if(isset($_POST['username']) && isset($_POST['lrn'])
           && isset($_POST['password'])&& isset($_POST['password2'])){
       
       if(!empty($_POST['username']) && !empty($_POST['lrn']) 
               && !empty($_POST['password']) && !empty($_POST['password2'])){
           
           $lrn         =   $formClass->e($_POST['lrn']);
           $username    =   $formClass->e($_POST['username']);
           $sql         =   $classes->checkExistQuery('student','studentLrnNum');
           $count       =   $classes->checkExist($sql,$lrn);
           if($count == 0){
                  echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Sorry LRN number does not exist in our database! </strong>'
                      .'</div>';
           }
           else
           {
            $row = $classes->fetchUser($sql,$lrn); 
            if($row['studentStat'] == 0){
                 $sqlCheckUser =   $classes->checkExistQuery('student','studentUsername');
                 $count1       =   $classes->checkExist($sqlCheckUser,$username);
                 if($count1 == 0){
                     
                     //echo 'user does not exit';
                     $password1 = $formClass->e($_POST['password']);
                     $password2 = $formClass->e($_POST['password2']);
                     if(strlen($password1) >= 8 && strlen($username) >= 8 ){
                     if($password1 == $password2){
                        $id           = $row['studentId'];
                        $sql          = $classes->updateRegisterQuery();
                        $hashPassword = password_hash($password1,PASSWORD_DEFAULT);
                        if($classes->updateRegister($sql,1,$username,$hashPassword,$id)){
                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Registration success ! <a href="index.php">login now</a></strong>'        
                      .'</div>';
                            
                        }
                        else
                        {
                     echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Registration fail please try again !</strong>'        
                      .'</div>';
                        }
                     }
                     else
                     {
                 echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Password does not match !</strong>'        
                      .'</div>';
                     }
                   }else{
                       echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong> Username and password must be at least 8 characters long</strong>'        
                      .'</div>';
                   }  
                 }
                 else
                 {          
                      echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Username is already taken, try '.$username. rand(0,1000).'</strong>'        
                      .'</div>';
                 }
            }
            else
            {
                   echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Student lrn acount is already registered<a href="index.php"> login</a></strong>'        
                      .'</div>';
            }
           }
       }
       else
       {
                      echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                        .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                          .'<span aria-hidden="true">&times;</span>'
                        .'</button>'
                        .'<strong>Please fill out all fields! </strong>'
                      .'</div>';
       }
   } 
  }
   /*end*/
  
  

  