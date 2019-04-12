<?php

include_once('../../php/include.php');



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
                   if(strlen($newPass1) >=8 && strlen($newPass2)>=8 ){
                   if($newPass1 == $newPass2){
                            $hashPass =  $formClass->hash($newPass1);
                            $sql      = $classes->updateOneQuery('student','studentPassword','studentId');
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
                    .'<strong>Password must be at least 8 characters long!<br></strong>'
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
?>
