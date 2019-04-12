
<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
   
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <?php
            //include_once('../../php/include.php');
            if(isset($_POST['manage'])){
                        $city    =   $formClass->e($_POST['city']);
                        $muni    =   $formClass->e($_POST['municipality']);
                        $brgy    =   $formClass->e($_POST['brgy']);
                        $st      =   $formClass->e($_POST['st']);
            }
            //
            if(isset($_POST['deleteSubject'])){
                if(isset($_POST['subject'])){
                    $sId    =   $formClass->e($_POST['subject']);
                    $sName  =   $formClass->e($_POST['subjectName']);
                    $sql2   =   $classes->checkExistQuery('session','subjectId');
                    $count  =   $classes->checkExist($sql2,$sId);
                    if($count == 0){
                    $sql    =   $classes->deleteQuery('subjects','subjectId');
                    $result =   $classes->delete($sql,$sId);
                        if($result == true){
                            echo $sName.' is deleted <a href="manageSubject.php">back to subject page</a>';
                        }else{
                            echo $sName.' can not delete <a href="manageSubject.php">back to subject page</a>';
                        }
                    }else{
                        echo $sName.' can not delete <a href="manageSubject.php">back to subject page</a>';
                    }
                }
            }
            //
            if(isset($_POST['updateSubject'])){
                if(isset($_POST['subjectName']) && isset($_POST['subjectCode']) && isset($_POST['subject'])){
                    $sId    =   $formClass->e($_POST['subject']);
                    $sName  =   $formClass->e($_POST['subjectName']);
                    $sCode  =   $formClass->e($_POST['subjectCode']);
                    $sql    =   $classes->checkSubjectQuery('subjects','subjectName');
                    $count  =   $classes->checkSubject($sql,$sName,$sCode);
                    if($count == 0){
                        $sql    =   $classes->updateSubjectQuery();
                        $result =   $classes->updateSubject($sql,$sCode,$sName,$sId);

                        if($result == true){
                            echo $sName.' is Updated <a href="manageSubject.php">back to subject page</a>';
                        }else{
                            echo $sName.' can not Updated <a href="manageSubject.php">back to subject page</a>';
                        }
                    
                    }else{
                        echo 'no change is done, its either subject name existed or you did not change anything<a href="manageSubject.php"> back to subject page</a>';
                    }
                }
            }
            //delete class
            if(isset($_POST['deleteClass'])){
                if(isset($_POST['classId'])){
                    $sId    =   $formClass->e($_POST['classId']);
                    $sql2   =   $classes->checkExistQuery('studentclass','classId');
                    $count  =   $classes->checkExist($sql2,$sId);
                    if($count == 0){
                    $sql    =   $classes->deleteQuery('class','classId');
                    $result =   $classes->delete($sql,$sId);
                        if($result == true){
                            echo 'Class is deleted <a href="manageClass.php">go back</a>';
                        }else{
                            echo 'Class can not delete <a href="manageClass.php">go back</a>';
                        }
                    }else{
                        echo 'Class can not delete <a href="manageClass.php">go back</a>';
                    }
                }                
            }
            //delete session of class
            if(isset($_POST['deleteClassSession'])){
                if(isset($_POST['sesId'])){
                    $sId    =   $formClass->e($_POST['sesId']);
                    $sql2   =   $classes->checkExistQuery('grade','sessionId');
                    $count  =   $classes->checkExist($sql2,$sId);
                    if($count == 0){
                    $sql    =   $classes->deleteQuery('session','sessionId');
                    $result =   $classes->delete($sql,$sId);
                        if($result == true){
                            echo 'deleted <a href="class.php">go back</a>';
                        }else{
                            echo 'Can not delete <a href="class.php">go back</a>';
                        }
                    }else{
                        echo 'Can not delete <a href="class.php">go back</a>';
                    }
                }   
            }
            
         //   
            if(isset($_POST['studentClass'])){
                if(isset($_POST['studId']) && isset($_POST['classId'])){
                    $cId    =   $formClass->e($_POST['classId']);
                    $studId =   $formClass->e($_POST['studId']);
                    
                    $sql2   =   $classes->queryStudentDeleteClass();
                    $count  =   $classes->checkExistTwo($sql2,$cId,$studId);
                    if($count == 0){
                    $sql    =   $classes->deleteQueryTwo('studentclass','studentId','classId');
                    $result =   $classes->delete2($sql,$studId,$cId);
                        if($result == true){
                            echo 'Student is removed from class <a href="class.php">go back</a>';
                        }else{
                            echo 'Student can not be remove <a href="class.php">go back</a>';
                        }
                    }else{
                        echo 'Student can not be remove <a href="class.php">go back</a>';
                    }
                }   
            }
            
            
            // 
            if(isset($_POST['updateTeacher'])){
                if(isset($_POST['teacher']) && isset($_POST['session'])){
                    $tId = $_POST['teacher'];
                    $sId = $_POST['session'];
                    $sql = $classes->updateOneQuery('session','teacherId','sessionId');
                    $result = $classes->updateOne($sql,$tId,$sId);
                        if($result == true){
                            echo 'Subject teacher has been updated<a href="class.php"> go back</a>';
                        }else{
                            echo 'Subject teacher update failed<a href="class.php">go back</a>';
                        }
                }
            }
            //delete session of class
            if(isset($_POST['deleteSy'])){
                if(isset($_POST['syId'])){
                    $sId    =   $formClass->e($_POST['syId']);
                    $sql2   =   $classes->checkExistQuery('class','syId');
                    $count  =   $classes->checkExist($sql2,$sId);
                    if($count == 0){
                    $sql    =   $classes->deleteQuery('schoolyear','syId');
                    $result =   $classes->delete($sql,$sId);
                        if($result == true){
                            echo 'deleted <a href="sySection.php">go back</a>';
                        }else{
                            echo 'Can not delete <a href="sySection.php">go back</a>';
                        }
                    }else{
                        echo 'Can not delete <a href="sySection.php">go back</a>';
                    }
                }   
            }
            //update section
            if(isset($_POST['updateSection'])){
                if(!empty($_POST['sectionName']) && !empty($_POST['sectionId'])){
                    $sName = $formClass->e($_POST['sectionName']);
                    $secId = $formClass->e($_POST['sectionId']);
                    $sql   = $classes->checkExistQuery('section','sectionName');
                    $count = $classes->checkExist($sql,$sName);
                  if($count == 0){
                      $sql    = $classes->updateOneQuery('section','sectionName','sectionId'); 
                      $result = $classes->updateOne($sql,$sName,$secId);
                      if($result == true){
                        echo 'Section is updated successfully <a href="sySection.php">go back</a>';  
                      }else{
                        echo 'Update Fail <a href="sySection.php">go back</a>';
                      }
                  }else{
                      echo 'Can not Update <a href="sySection.php">go back</a>';
                  } 
                    
                }else{
                        echo 'Can not Update <a href="sySection.php">go back</a>';
                }
            }
            
            //delete session of class
            if(isset($_POST['deleteSection'])){
                if(isset($_POST['secId'])){
                    $sId    =   $formClass->e($_POST['secId']);
                    $sql2   =   $classes->checkExistQuery('class','sectionId');
                    $count  =   $classes->checkExist($sql2,$sId);
                    if($count == 0){
                    $sql    =   $classes->deleteQuery('section','sectionId');
                    $result =   $classes->delete($sql,$sId);
                        if($result == true){
                            echo 'deleted <a href="sySection.php">go back</a>';
                        }else{
                            echo 'Can not delete <a href="sySection.php">go back</a>';
                        }
                    }else{
                        echo 'Can not delete <a href="sySection.php">go back</a>';
                    }
                }   
            }
            ?>
          
      </ol>
        
      <div class="row">

        <!-- students table -->
        <div class="col-lg-12">
          
        </div>
      </div>
				
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>


    