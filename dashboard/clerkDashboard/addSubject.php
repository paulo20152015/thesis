<?php
include_once('../../php/include.php');

//subject adding for grade 1-10
if(isset($_POST['addSubject110']))
{
 if(isset($_POST['subject']))
 {
     if(!empty($_POST['subject']))
     {
         // default subject code for grade 1 to 10
         $code      = 'LOWER';
         $subject   = $formClass->e($_POST['subject']);
         //check if it alreadry exist in the db 
         $sql       = $classes->checkSubjectQuery();
       
         $count     = $classes->checkSubject($sql,$subject,$code);
         
         if($count > 0)
         {
            echo 'this subject existed already';
         
         }
         else
         {
             $sql   = $classes->insertSubjectQuery();
             if($classes->insertSubject($sql,$subject,$code) == true)
             {
                echo 'Subject has been added';
             }
             else
             {
                echo 'an error has occur';
             }
         }
 
     }
     else
     {
         echo 'Please fill out all fields';
     }
 }
}

//subject adding for grade 11-12
if(isset($_POST['addSubject1112'])){
 if(isset($_POST['subject']) && isset($_POST['code'])){
     if(!empty($_POST['subject']) && !empty($_POST['code'])){
         // default subject code for grade 1 to 10
         $code      = $formClass->e($_POST['code']);
         $subject   = $formClass->e($_POST['subject']);
         //check if it alreadry exist in the db 
         $sql       = $classes->checkSubjectQuery();
       
         $count     = $classes->checkSubject($sql,$subject,$code);
         
         if($count > 0){
             echo 'this subject existed already';
         
         }else{
             $sql    = $classes->insertSubjectQuery();
             if($classes->insertSubject($sql,$subject,$code) == true){
                echo 'Subject has been added';
             }else{
                 echo 'an error has occur';
             }
         }
 
     }else{
         echo 'Please fill out all fields';
     }
 }
}

//student adding
if(isset($_POST['addStudent']))
{
    if(   isset($_POST['lrn'])          && isset($_POST['fname'])   && isset($_POST['mname']) 
       && isset($_POST['lname'])        && isset($_POST['gender']) )
    {
           if(  !empty($_POST['lrn'])           && !empty($_POST['fname'])  && !empty($_POST['mname']) 
            &&  !empty($_POST['lname'])         && !empty($_POST['gender']) )
            {
               $lrn     =   $formClass->e($_POST['lrn']);
               $fname   =   $formClass->e($_POST['fname']);
               $mname   =   $formClass->e($_POST['mname']);
               $lname   =   $formClass->e($_POST['lname']);
               $gender  =   $formClass->e($_POST['gender']); 
               $sql     =   $classes->checkExistQuery('student','studentLrnNum');
               $count   =   $classes->checkExist($sql,$lrn);
               if($count == 0){
                    $sql     =   $classes->addStudentQuery();
                    $value   =   $classes->addStudent($sql,$lrn,$fname,$mname,$lname,$gender);
                    if($value === true){
                        echo 'You\'ve successfully added' ;
                    }else{
                        echo 'failed ';
                    }
               }else{
                   echo 'LRN already existed, please check';
               }
            }
            else
            {
                echo "Please fill out all field";    
            }
    }
}

//adding parent
if(isset($_POST['addParent']))
{
   if(    isset($_POST['fname'])    && isset($_POST['mname']) 
       && isset($_POST['lname'])    && isset($_POST['gender'])      && isset($_POST['contact'])
       && isset($_POST['username']) && isset($_POST['password']))
    {
           if(  !empty($_POST['fname'])     && !empty($_POST['mname']) 
            &&  !empty($_POST['lname'])     && !empty($_POST['gender']) && !empty($_POST['contact'])
            &&  !empty($_POST['username'])  && !empty($_POST['password']))
            {           
               $fname   =   $formClass->e($_POST['fname']);
               $mname   =   $formClass->e($_POST['mname']);
               $lname   =   $formClass->e($_POST['lname']);
               $gender  =   $formClass->e($_POST['gender']); 
               $contact =   $formClass->e($_POST['contact']);
               $username=   $formClass->e($_POST['username']);
               $password=   $formClass->e($_POST['password']);
               $password=   password_hash($password, PASSWORD_DEFAULT);
               $sql     =   $classes->checkExistQuery('parent','parentUsername');
               $count   =   $classes->checkExist($sql,$username);
               if($count == 0){
                    $sql     =   $classes->addParentQuery();
                    $value   =   $classes->addParent($sql,$fname,$mname,$lname,$gender,$contact,$username,$password);
                    if($value === true){
                        echo 'Added';
                    }else{
                        echo 'failed ';
                    }
               }else{
                   echo 'Username already existed, please check';
               }
            }
            else
            {
                echo "Please fill out all field";    
            }
    }
}

//school year adding
if(isset($_POST['addSy'])){
 if(isset($_POST['sy'])){
     if(!empty($_POST['sy'])){
       
         $sy      = $formClass->e($_POST['sy']);
         //check if it alreadry exist in the db
      if(strlen($sy) <= 9){ 
        if(strpos($sy,'2') === 0 && strpos($sy,'-') === 4){
            $num1 = substr($sy,0,4);
            
            $num2 = substr($sy,5,8);
            if(preg_match('/^[0-9]+$/', $num1) && preg_match('/^[0-9]+$/', $num2)){
                        $num1   = intval($num1);
                        $num2   = intval($num2);
                        $result = $num1 - $num2;
                        if($result < 1){
                                $sql       = $classes->checkExistQuery('schoolyear','sy');

                                $count     = $classes->checkExist($sql,$sy);

                                if($count > 0){
                                    echo 'this school year existed already';

                                }else{
                                    $sql    = $classes->insertQuery('schoolyear','sy');
                                    if($classes->insert($sql,$sy) == true){
                                       echo 'School Year has been added';
                                    }else{
                                        echo 'an error has occur';
                                    }
                                }
                        }else{
                            echo 'Please follow the format';
                        }
            }else{
                echo 'Must be numeric';
            }
        }else{
            echo 'Please follow the format';
        }
      }else{
          echo 'max character limit is 9 ';
      } 
        
     }else{
         echo 'Please fill out all fields';
     }
 }
}

//adding section
if(isset($_POST['addSection'])){
 if(isset($_POST['section'])){
     if(!empty($_POST['section'])){
        
         $section      = $formClass->e($_POST['section']);
         //check if it alreadry exist in the db 
         $sql       = $classes->checkExistQuery('section','sectionName');
       
         $count     = $classes->checkExist($sql,$section);
         
         if($count == 0){
             $sql    = $classes->insertQuery('section','sectionName');
             if($classes->insert($sql,$section) == true){
                echo 'section has been added';
             }else{
               echo 'an error has occur';
             }
         }else{
             echo 'this section existed already';
         }
 
     }else{
         echo 'Please fill out all fields';
     }
 }
}

//class grade 7-10
if(isset($_POST['addClass'])){
    if(isset($_POST['teacher']) && isset($_POST['grade']) && isset($_POST['sy']) && isset($_POST['section']) && isset($_POST['category'])){
        if(!empty($_POST['teacher']) && !empty($_POST['grade']) && !empty($_POST['sy']) && !empty($_POST['section']) && !empty($_POST['category'])){
             $t      = $formClass->e($_POST['teacher']);
             $g      = $formClass->e($_POST['grade']);
             $sy     = $formClass->e($_POST['sy']);
             $sec    = $formClass->e($_POST['section']);
             $cat    = $formClass->e($_POST['category']);
            $sql     = $classes->checkFiveFilterQuery('class','teacherId','gradeLevelId','syId','sectionId','categoryId'); 
            $count   = $classes->checkFiveFilterRow($sql,$t,$g,$sy,$sec,$cat);
            if($count == 0){
            $sql2     = $classes->checkFourFilterQuery('class','gradeLevelId','syId','sectionId','categoryId'); 
            $count2   = $classes->checkFourFilter($sql2,$g,$sy,$sec,$cat);
               if($count2 == 0){ 
               $sql    = $classes->insertFiveQuery('class','teacherId','gradeLevelId','syId','sectionId','categoryId');
                if($classes->insertFive($sql,$t,$g,$sy,$sec,$cat) == true){
                   echo 'class has been added';
                }else{
                    echo 'an error has occur';
                }
               }else{
                   echo 'Class entry already existed, please check';
               }
            }else{
                echo 'Class entry already existed, please check';
            }
        }else{
            echo 'Please fill out all fields';
        }
    }
}

//grade 11-12
if(isset($_POST['addClass2'])){
       if(isset($_POST['teacher']) && isset($_POST['grade']) && isset($_POST['sy']) && isset($_POST['section']) && isset($_POST['category'])){
        if(!empty($_POST['teacher']) && !empty($_POST['grade']) && !empty($_POST['sy']) && !empty($_POST['section']) && !empty($_POST['category'])){
             $t      = $formClass->e($_POST['teacher']);
             $g      = $formClass->e($_POST['grade']);
             $sy     = $formClass->e($_POST['sy']);
             $sec    = $formClass->e($_POST['section']);
             $cat    = $formClass->e($_POST['category']);
            $sql     = $classes->checkFiveFilterQuery('class','teacherId','gradeLevelId','syId','sectionId','categoryId'); 
            $count   = $classes->checkFiveFilterRow($sql,$t,$g,$sy,$sec,$cat);
            if($count == 0){
             $sql2     = $classes->checkFourFilterQuery('class','gradeLevelId','syId','sectionId','categoryId'); 
            $count2   = $classes->checkFourFilter($sql2,$g,$sy,$sec,$cat);  
            if($count2 == 0){
             $sql    = $classes->insertFiveQuery('class','teacherId','gradeLevelId','syId','sectionId','categoryId');
             if($classes->insertFive($sql,$t,$g,$sy,$sec,$cat) == true){
                echo 'class has been added';
             }else{
                 echo 'an error has occur';
             }
            }else{
                 echo 'Class entry already existed, please check';
            }
            }else{
                echo 'Class entry already existed, please check';
            }
        }else{
            echo 'Please fill out all fields';
        }
    } 
}


