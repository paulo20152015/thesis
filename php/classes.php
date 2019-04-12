<?php
include_once('config.php');
//database class and queries
class classes{
    public  $con;
    public  function connect(){
        $this->con = new PDO("mysql:host=".HOST.";dbname=".DB."",USER,PASS);
    }
    public function __construct() {
        $this->connect();
    }
    //for checking
    public function checkExistQuery($table,$id){
        $sql = "SELECT * FROM $table WHERE $id =:username ";
        return $sql;
    }
    //for login
    public function checkExist($sql,$username){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':username',$username);
        $smt->execute();
        $smt->fetch(PDO::FETCH_ASSOC);
        $value = $smt->rowCount();
        return $value;
    }
        //for checking
    public function checkExistTwoQuery($table,$first,$second){
        $sql = "SELECT * FROM $table WHERE $first =:first && $second =:second";
        return $sql;
    }

    public function checkExistTwo($sql,$first,$second){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':first',$first);
        $smt->bindParam(':second',$second);
        $smt->execute();
        $smt->fetch(PDO::FETCH_ASSOC);
        $value = $smt->rowCount();
        return $value;
    }

     public function fetchUser($sql,$username){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':username',$username);
        $smt->execute();
        $row = $smt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    //check if subject existed query
    public function checkSubjectQuery(){
        $sql = "SELECT * FROM subjects WHERE subjectName = :subject && subjectCode = :code ";
        return $sql;
    }
    //check if subject existed 
    public function checkSubject($sql,$subject,$code){
        $smt = $this->con->prepare($sql);
         $smt->bindParam(':subject',$subject);
          $smt->bindParam(':code',$code);
        $smt->execute();
        $smt->fetch(PDO::FETCH_ASSOC);
        $result = $smt->rowCount();
        return $result;
    }
    //insert subject query
    public function insertSubjectQuery(){
        $sql = "INSERT INTO subjects(subjectId, subjectCode, subjectName) VALUES(NULL,:code,:subject)";
        return $sql;
    }
    //insert Subject
    public function insertSubject($sql,$subject,$code){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':subject',$subject);
        $smt->bindParam(':code',$code);
        if($smt->execute()){
            return true;
        }
    }
    
    public function fetchSubjectQuery(){
        $sql = "SELECT * FROM subjects WHERE subjectCode =:code";
        return $sql;
    }
    public function notFetchSubjectQuery(){
        $sql = "SELECT * FROM subjects WHERE subjectCode !=:code";
        return $sql;
    }
    public function fetchSubject($sql,$code){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':code',$code);
        $smt->execute();
        return $smt;
    }
    
    //addstudent
    public function addStudentQuery(){
        $value = "INSERT INTO student(studentLrnNum,    studentFname,   studentMname,"
                                     . "studentLname, "
                                     . "studentGender)values(    :lrn,       :fname,     :mname,"
                                     . ":lname,     :gender)";
        return $value;
    }
    public function addStudent($sql,$lrn,$fname,$mname,$lname,$gender){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':lrn'    ,$lrn);
        $smt->bindParam(':fname'  ,$fname);
        $smt->bindParam(':mname'  ,$mname);
        $smt->bindParam(':lname'  ,$lname);
        $smt->bindParam(':gender' ,$gender);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
    }
    //addstudent
    public function addParentQuery(){
        $value = "INSERT INTO parent(  parentFname,   parentMname,"
                                     . "parentLname,   parentGender,  parentContactNum,   parentUsername,"
                                     . "parentPassword)values(      :fname,     :mname,"
                                     . ":lname,     :gender,        :contact,   :username,  :password)";
        return $value;
    }
    //add parent
    public function addParent($sql,$fname,$mname,$lname,$gender,$contact,$username,$password){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':fname'    ,$fname);
        $smt->bindParam(':mname'    ,$mname);
        $smt->bindParam(':lname'    ,$lname);
        $smt->bindParam(':gender'   ,$gender);
        $smt->bindParam(':contact'  ,$contact);
        $smt->bindParam(':username' ,$username);
        $smt->bindParam(':password' ,$password);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    //for inserting one value
    public function insertQuery($table,$field){
        $sql = "INSERT INTO $table($field)VALUES(:field)";
        return $sql;
    }
    public function insert($sql,$fieldVal){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':field',$fieldVal);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    //update student info on registering
    public function updateRegisterQuery(){
        $sql = "UPDATE student SET `studentStat` =:stat,`studentUsername` =:user, `studentPassword` = :pass WHERE `studentId` =:userId ";
        return $sql;
    }
    public function updateRegister($sql,$stat,$user,$pass,$id){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':stat',$stat);
        $smt->bindParam(':user',$user);
        $smt->bindParam(':pass',$pass);
        $smt->bindParam(':userId',$id);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    // select ting from any table
    public function selectAllQuery($table){
        $sql = "SELECT * FROM $table";
        return $sql;
    }
        public function selectAllQueryAsc($table,$name){
        $sql = "SELECT * FROM $table ORDER BY $name Asc";
        return $sql;
    }
  public function selectAllQueryAscWithAcitveQuery($table,$name,$active){
        $sql = "SELECT * FROM $table WHERE $active =:active  ORDER BY $name Asc ";
        return $sql;
    }
    public function selectAllQueryAscWithAcitveQuery2(){
        $sql = "SELECT * FROM `teacher` inner JOIN accounts ON teacher.teacherId = accounts.teacherId WHERE accounts.role = 'teacher' && teacher.teacherStat = 1 ORDER BY `teacher`.`teacherLname` ASC";
        return $sql;
    }
    public function selectAllQueryAscWithAcitve($sql,$active){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':active',$active);
        $smt->execute();
        return $smt;
    }
    public function selectAll($sql){
        $smt = $this->con->prepare($sql);
        $smt->execute();
        return $smt;
    }
    //return count
    public function selectAllCount($sql){
        $smt = $this->con->prepare($sql);
        $smt->execute();
        $smt->fetch(PDO::FETCH_ASSOC);
        $count = $smt->rowCount();
        return $count;
    }
    //
    public function selectAllFilter($sql,$username){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':username',$username);
        $smt->execute();
        return $smt;
    }
    public function negateSelectQuery($table,$table2,$param1,$param2,$where){
        $sql = "SELECT * FROM $table INNER JOIN $table2 ON $param1 = $param2 WHERE $where !=:username";
        return $sql;
    }
    // checking class
    public function checkClassQuery(){
        $sql = "SELECT * FROM `class` WHERE teacherId = :teacher && gradeLevelId = :gradeLevel && syId = :sy && sectionId = :section && categoryId = :section";
        return $sql;   
    }
    
    public function checkClass($sql,$t,$g,$sy,$sec){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':teacher',$t);
        $smt->bindParam(':gradeLevel',$g);
        $smt->bindParam(':sy',$sy);
        $smt->bindParam(':section',$sec);
        $smt->execute();
        $smt->fetch(PDO::FETCH_ASSOC);
        $result = $smt->rowCount();
        return $result;
    }
    //
     //addstudent
    public function addClassQuery(){
        $value = "INSERT INTO class(  teacherId,"
                                     . "gradeLevelId,   syId,"
                                     . "sectionId)values(  :teacher,"
                                     . ":gradeLevel,     :sy,        :section)";
        return $value;
    }
    //add parent
    public function addClass($sql,$t,$g,$sy,$sec){
        $smt = $this->con->prepare($sql);

        $smt->bindParam(':teacher',$t);
        $smt->bindParam(':gradeLevel',$g);
        $smt->bindParam(':sy',$sy);
        $smt->bindParam(':section',$sec);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
    }
    //display classes grade 11-12
    public function viewClassQuery(){
        $sql = "SELECT * FROM class INNER JOIN teacher ON class.teacherId = teacher.teacherId"
                . "  INNER JOIN gradelevel ON"
                . " class.gradeLevelId = gradelevel.gradeLevelId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN section ON class.sectionId = section.sectionId INNER JOIN category ON class.categoryId = category.categoryId WHERE gradelevel.level =:level ";
        return $sql;
    }
    //display classesgrade 7-10
    public function viewClassQueryNot(){
        $sql = "SELECT * FROM class INNER JOIN teacher ON class.teacherId = teacher.teacherId"
                . "  INNER JOIN gradelevel ON"
                . " class.gradeLevelId = gradelevel.gradeLevelId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN section ON class.sectionId = section.sectionId INNER JOIN category ON class.categoryId = category.categoryId  WHERE gradelevel.level =:level ";
        return $sql;
    }
    //display classes
    public function viewClass($sql,$level){

        $smt = $this->con->prepare($sql);
        $smt->bindParam(':level',$level);
        $smt->execute();
        return $smt;
    }
    //for deleting
    public function deleteQuery($table,$field){
        $sql = "DELETE FROM $table WHERE $field = :field";
        return $sql;
    }
    public function deleteQueryTwo($table,$field,$field2){
        $sql = "DELETE FROM $table WHERE $field = :field && $field2 = :field2";
        return $sql;
    }
    public function delete($sql,$field){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':field',$field);
        $result = $smt->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete2($sql,$field,$field2){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':field',$field);
        $smt->bindParam(':field2',$field2);
        $result = $smt->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function updateSubjectQuery(){
        $sql = "UPDATE subjects SET subjectCode = :code , subjectName = :name WHERE subjectId = :id";
        return $sql;
    }
    
    public function updateSubject($sql,$code,$name,$id){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':code',$code);
        $smt->bindParam(':name',$name);
        $smt->bindParam(':id',$id);
        $result = $smt->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function insertParentQuery(){
        $sql = "INSERT INTO parent(parentFname,parentLname,parentMname,relation,parentContactNum,parentGender,parentUsername,parentPassword) "
                . "values(:fname,:lname,:mname,:rel,:contact,:gender,:username,:password)";
        return $sql;
    }
    
    public function insertParent($sql,$fname,$lname,$mname,$rel,$contact,$gend,$username,$password){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':fname',$fname);
        $smt->bindParam(':lname',$lname);
        $smt->bindParam(':mname',$mname);
        $smt->bindParam(':rel',$rel);
        $smt->bindParam(':contact',$contact);
        $smt->bindParam(':gender',$gend);
        $smt->bindParam(':username',$username);
        $smt->bindParam(':password',$password);
        if($smt->execute()){
            return true;
        }else{
            return false;
        } 
    }
    //for inserting 2 values
    public function insertTwoQuery($table,$first,$second){
        $sql = "INSERT INTO $table($first,$second)VALUES(:first,:second)";
        return $sql;
    } 
    public function insertTwo($sql,$first,$second){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':first',$first);
        $smt->bindParam(':second',$second);
        $smt->execute();
    }
    public function insertTwoReturn($sql,$first,$second){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':first',$first);
        $smt->bindParam(':second',$second);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
    }
    //queries that insert 3 values
    public function insertThreeQuery($table,$first,$second,$third){
        $sql = "INSERT INTO $table($first,$second,$third)VALUES(:first,:second,:third)";
        return $sql;
    } 
    public function insertThreeReturn($sql,$first,$second,$third){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':first',$first);
        $smt->bindParam(':second',$second);
        $smt->bindParam(':third',$third);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
    }
    //insert 4
    public function insertFourQuery($table,$first,$second,$third,$fourth){
        $sql = "INSERT INTO $table($first,$second,$third,$fourth)VALUES(:first,:second,:third,:fourth)";
        return $sql;
    } 
    public function insertFour($sql,$first,$second,$third,$fourth){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':first',$first);
        $smt->bindParam(':second',$second);
        $smt->bindParam(':third',$third);
        $smt->bindParam(':fourth',$fourth);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function stuParQuery(){
        $sql    = "SELECT * FROM parent WHERE parentFname = :fname && parentMname = :mname && parentLname = :lname && parentContactNum = :contact";
        return $sql;   
    }
    public function stuPar($sql,$fname,$mname,$lname,$contact){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':fname',$fname);
        $smt->bindParam(':mname',$mname);
        $smt->bindParam(':lname',$lname);
        $smt->bindParam(':contact',$contact);
        $smt->execute();
        $row = $smt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // query from student and parent
    public function selectStudentParentQuery(){
        $sql = $sql = "SELECT parent.parentId, parent.parentLname,parent.parentMname,parent.parentFname,parent.parentContactNum,parent.parentGender,parent.relation FROM studentparent INNER JOIN parent ON parent.parentId = studentparent.parentId INNER JOIN student ON student.studentId = studentparent.studentId WHERE student.studentId = :studId";
        return $sql;
    }
    public function selecStudentParent($sql,$sId){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':studId',$sId);
        $smt->execute();
        return $smt;
    }
    public function selectParentStudentQuery(){
        $sql = "SELECT student.studentLrnNum,student.studentLname,student.studentFname,student.studentMname,student.studentGender,student.studentLevel FROM studentparent INNER JOIN student on studentparent.studentId = student.studentId WHERE studentparent.parentId = :parId";
        return $sql;
    }
    public function selectParentStudent($sql,$pId){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':parId',$pId);
        $smt->execute();
        return $smt;
    }
    
    //for updating 4 columns
    public function updateFourQuery($table,$first,$second,$third,$fourth,$where){
        $sql = "UPDATE $table SET $first = :first, $second = :second,$third = :third,$fourth = :fourth WHERE $where = :id";
        return $sql;    
     }
     public function updateFour($sql,$first,$second,$third,$fourth,$id){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':first',$first);
        $smt->bindParam(':second',$second);
        $smt->bindParam(':third',$third);
        $smt->bindParam(':fourth',$fourth);
        $smt->bindParam(':id',$id);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
     }
       //for updating 1
    public function updateOneQuery($table,$first,$where){
        $sql = "UPDATE $table SET $first = :first WHERE $where = :id";
        return $sql;    
     }
     public function updateOne($sql,$first,$id){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':first',$first);
        $smt->bindParam(':id',$id);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
     }
     
     public function setInactiveQuery(){
         $sql = "UPDATE schoolyear SET active = :first WHERE syId !=:id";
         return $sql;
     }
     
     public function getClassInfoQuery(){
         $sql = "SELECT * FROM class INNER JOIN teacher ON class.teacherId = teacher.teacherId INNER JOIN gradelevel ON class.gradeLevelId = gradelevel.gradeLevelId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN section ON class.sectionId = section.sectionId WHERE class.classId = :username";
         return $sql;
      }
     public function getSessionQuery(){
         $sql = "SELECT * FROM `session` INNER JOIN subjects ON session.subjectId = subjects.subjectId INNER JOIN teacher ON session.teacherId = teacher.teacherId WHERE classId = :studId";
         return $sql;
      }
      public function getSchedQuery(){
          $sql = "SELECT * FROM `schedule` INNER JOIN room ON schedule.roomId = room.roomId WHERE sessionId = :studId";
          return $sql;
      }
      public function getClassQuery(){
          $sql = "SELECT * FROM `class` INNER JOIN gradelevel ON class.gradeLevelId = gradelevel.gradeLevelId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN section ON class.sectionId = section.sectionId WHERE gradelevel = :studId && schoolyear.active = 1";
          return $sql;
      }
      public function getClassSessionQuery(){
          $sql = "SELECT * FROM `session` INNER JOIN subjects ON session.subjectId = subjects.subjectId INNER JOIN teacher ON session.teacherId = teacher.teacherId WHERE classId = :studId";
          return $sql;
      }
      public function getStudentClassQuery(){
          $sql = "SELECT * FROM `studentclass` INNER JOIN student ON studentclass.studentId = student.studentId WHERE classId = :studId";
          return $sql;
      }
      //select with three values filter
      public function selectThreeFilterQuery($table,$first,$second,$third){
         $sql = "SELECT * FROM $table WHERE $first = :first && $second = :second && $third = :third";
         return $sql; 
      }
      public function selectThreeFilter($sql,$first,$second,$third){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->execute();
          $smt->fetch(PDO::FETCH_ASSOC);
          $count = $smt->rowCount();
          return $count;
      }
      //five values
      public function insertFiveQuery($table,$first,$second,$third,$fourth,$fifth){
          $sql = "INSERT INTO $table($first,$second,$third,$fourth,$fifth) VALUES(:first,:second,:third,:fourth,:fifth)";
          return $sql;
      }
      public function insertFive($sql,$first,$second,$third,$fourth,$fifth){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->bindParam(':fourth',$fourth);
          $smt->bindParam(':fifth',$fifth);
          if($smt->execute()){
              return true;
          }else{
              return false;
          }
          
      }
      //checking with five filters
      public function checkFiveFilterQuery($table,$first,$second,$third,$fourth,$fifth){
          $sql = "SELECT * FROM $table WHERE $first =:first && $second =:second && $third = :third && $fourth = :fourth && $fifth = :fifth";
          return $sql;
      }
      public function checkFiveFilter($sql,$first,$second,$third,$fourth,$fifth){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->bindParam(':fourth',$fourth);
          $smt->bindParam(':fifth',$fifth);
          $smt->execute();
          $smt->fetch(PDO::FETCH_ASSOC);
          $count = $smt->rowCount();
          return $count;
      }
       //checking with five filters
      public function checkFourFilterQuery($table,$first,$second,$third,$fourth){
          $sql = "SELECT * FROM $table WHERE $first =:first && $second =:second && $third = :third && $fourth = :fourth";
          return $sql;
      }
      public function checkFourFilter($sql,$first,$second,$third,$fourth){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->bindParam(':fourth',$fourth);
          $smt->execute();
          $smt->fetch(PDO::FETCH_ASSOC);
          $count = $smt->rowCount();
          return $count;
      }
      public function checkFiveFilterRow($sql,$first,$second,$third,$fourth,$fifth){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->bindParam(':fourth',$fourth);
          $smt->bindParam(':fifth',$fifth);
          $smt->execute();
          $row = $smt->fetch(PDO::FETCH_ASSOC);
          return $row;
      }
      
      //sql join session sy filter/teacherId
      public function getTeacherSessionQuery(){
         $sql = "SELECT * FROM session INNER JOIN class ON session.classId = class.classId INNER JOIN subjects ON session.subjectId = subjects.subjectId INNER JOIN schoolyear ON class.syId = schoolyear.syId WHERE schoolyear.active =1 && session.teacherId =:parId";
          return $sql;
      }
      
      //sql join schedule viewing
      public function getTeacherSchedule(){
        $sql = "SELECT * FROM schedule INNER JOIN session ON schedule.sessionId = session.sessionId INNER JOIN room ON schedule.roomId = room.roomId INNER JOIN teacher ON session.teacherId = teacher.teacherId INNER JOIN subjects ON session.subjectId = subjects.subjectId INNER JOIN class ON session.classId = class.classId INNER JOIN gradelevel ON class.gradeLevelId = gradelevel.gradeLevelId INNER JOIN schoolyear on class.syId = schoolyear.syId WHERE teacher.teacherId = :first && schoolyear.syId = :second ORDER BY day asc";  
        return $sql;      
      }
      public function selectTwoFilter($sql,$first,$second){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->execute();
          return $smt;
      }
     public function selectTwoFilterQueryAsc($table,$first,$second,$order){
         $sql = "SELECT * FROM $table WHERE $first = :first && $second = :second ORDER BY $order ASC";
         return $sql; 
      }
     public function selectTwoFilterQuery($table,$first,$second){
         $sql = "SELECT * FROM $table WHERE $first = :first && $second = :second";
         return $sql; 
      }
     public function selectTwoReturn($sql,$first,$second){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->execute();
          $smt->fetch(PDO::FETCH_ASSOC);
          $count = $smt->rowCount();
          return $count;
      }
     public function selectTwoReturnRow($sql,$first,$second){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->execute();
         $row = $smt->fetch(PDO::FETCH_ASSOC);      
          return $row;
      }
      public function getTeacherSubjects(){
          $sql = "SELECT * FROM `session` INNER JOIN teacher ON session.teacherId = teacher.teacherId INNER JOIN subjects ON session.subjectId = subjects.subjectId INNER JOIN class ON session.classId = class.classId INNER JOIN gradelevel ON class.gradeLevelId = gradelevel.gradeLevelId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN section ON class.sectionId = section.sectionId INNER JOIN category ON class.categoryId =category.categoryId WHERE schoolyear.active = :first && teacher.teacherId = :second ORDER BY `schoolyear`.`sy` ASC";
          return $sql;
      }
      public function getStudentClassSession(){
          $sql = "SELECT * FROM `session` INNER JOIN studentclass ON session.classId = studentclass.classId INNER JOIN student ON studentclass.studentId = student.studentId WHERE session.classId = :first && session.sessionId = :second";
          return $sql;
      }
      public function selectTwoFilterRowQuery($table,$cat,$field1,$field2){
          $sql = "SELECT * FROM $table WHERE $field1 = :first && $field2 =:second ORDER BY $cat ASC";
          return $sql;
      }
      public function selectTwoFilterRow($sql,$first,$second){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->execute();
          return $smt;
      }
       public function selectTwoFilterCount($sql,$first,$second){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->execute();
          $smt->fetch(PDO::FETCH_ASSOC);
          $count = $smt->rowCount();
          return $count; 
      }  
     //for updating 1
      public function updateOneThreeFilterQuery($table,$first,$second,$where1,$where2,$where3){
        $sql = "UPDATE $table SET $first = :first, $second =:second  WHERE $where1 = :third && $where2 =:fourth && $where3=:fifth";
        return $sql;    
      }
      public function updateOneThreeFilter($sql,$first,$second,$third,$fourth,$fifth){
        $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->bindParam(':fourth',$fourth);
          $smt->bindParam(':fifth',$fifth);
        if($smt->execute()){
            return true;
        }else{
            return false;
        }
      }
      

      
      public function getTeacherClassQuery(){
          $sql = "SELECT * FROM `class` INNER JOIN teacher ON class.teacherId=teacher.teacherId INNER JOIN gradelevel ON class.gradeLevelId=gradelevel.gradeLevelId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN section ON class.sectionId = section.sectionId INNER JOIN category ON class.categoryId = category.categoryId WHERE class.teacherId = :active";
          return $sql;       
      }
      //with active status filter
      public function getTeacherClassQueryStat(){
          $sql = "SELECT * FROM `class` INNER JOIN teacher ON class.teacherId=teacher.teacherId INNER JOIN gradelevel ON class.gradeLevelId=gradelevel.gradeLevelId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN section ON class.sectionId = section.sectionId INNER JOIN category ON class.categoryId = category.categoryId WHERE class.teacherId = :active && schoolyear.active = 1";
          return $sql;       
      }
      public function getClassStudentQuery(){
          $sql = "SELECT * FROM `studentclass` INNER JOIN student ON studentclass.studentId = student.studentId WHERE classId = :active";
          return $sql;
      }

        public function getStudentSchedSyQuery(){
          $sql = "SELECT * FROM `studentclass` INNER JOIN class ON studentclass.classId = class.classId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN category ON class.categoryId = category.categoryId WHERE schoolyear.active = 1 && studentclass.studentId =:active";
          return $sql;
      }
      public function getStudentSchedQuery(){
          $sql = "SELECT * FROM `schedule` INNER JOIN session ON schedule.sessionId = session.sessionId INNER JOIN room ON schedule.roomId = room.roomId INNER JOIN class ON session.classId = class.classId INNER JOIN gradelevel ON class.gradeLevelId = gradelevel.gradeLevelId INNER JOIN subjects ON session.subjectId = subjects.subjectId INNER JOIN teacher ON session.teacherId = teacher.teacherId INNER JOIN schoolyear ON class.syId = schoolyear.syId INNER JOIN studentclass ON class.classId = studentclass.classId INNER JOIN category ON class.categoryId = category.categoryId WHERE studentclass.studentId = :first && schoolyear.syId = :second && category.categoryName = :third";
          return $sql;
      }
      
       public function selectThreesReturn($sql,$first,$second,$third){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->execute();
          return $smt;
           }
      public function getAdmitClassQuery(){
          $sql = "SELECT * FROM `studentclass` INNER JOIN class ON studentclass.classId = class.classId INNER JOIN gradelevel ON gradelevel.gradeLevelId = class.gradeLevelId INNER JOIN schoolyear ON schoolyear.syId = class.syId INNER JOIN section ON class.sectionId = section.sectionId INNER JOIN category ON class.categoryId = category.categoryId WHERE studentclass.studentId = :parId";
          return $sql;
      }
      public function getSubjectGradeQuery(){
          $sql = "SELECT * FROM studentclass INNER JOIN class ON studentclass.classId = class.classId INNER JOIN category ON class.categoryId = category.categoryId INNER JOIN session ON session.classId = class.classId INNER JOIN subjects ON session.subjectId = subjects.subjectId WHERE studentId = :first && class.classId = :second";
          return $sql;
      }
      public function tryGettingSubjectGrade(){
          $sql = "SELECT * FROM `session` INNER JOIN studentclass ON session.classId = studentclass.classId INNER JOIN subjects ON session.subjectId = subjects.subjectId WHERE studentclass.studentId =:first && session.classId = :second";
          return $sql;
      }
      public function gettingSubjectGrade(){
          $sql = "SELECT * FROM `grade` WHERE sessionId = :first && studentId = :second ORDER BY gradeCategory ASC";
          return $sql;
      }
      public function getOneField($table,$field,$where){
          $sql = "SELECT $field FROM $table WHERE $where =:username";
          return $sql;
      }
      public function fetchField($sql,$username){
        $smt = $this->con->prepare($sql);
        $smt->bindParam(':username',$username);
        $smt->execute();
        return $smt;
    }
    //getting parent students
      public function getParentsStudents(){
          $sql = "SELECT * FROM `studentparent` INNER JOIN student ON studentparent.studentId = student.studentId WHERE studentparent.parentId = :username";
          return $sql;
      }
      //get
      public function getClassStudentAndParent(){
          $sql = "SELECT * FROM `class` INNER JOIN studentclass ON class.classId = studentclass.classId INNER JOIN student ON studentclass.studentId = student.studentId INNER JOIN studentparent ON studentparent.studentId = student.studentId INNER JOIN parent ON parent.parentId = studentparent.parentId WHERE class.classId = :username";
          return $sql;
      }
      public function getStudentGrades(){
          $sql = "SELECT * FROM `session`INNER JOIN grade ON grade.sessionId = session.sessionId INNER JOIN subjects ON subjects.subjectId = session.subjectId WHERE grade.studentId =:first && grade.gradeCategory = :second && session.classId = :third";
          return $sql;
      }
      public function limitAdmitQuery(){
          $sql = "SELECT * FROM `studentclass` INNER JOIN class ON studentclass.classId = class.classId WHERE class.syId = :first && class.gradeLevelId = :second && class.categoryId = :third && studentclass.studentId = :fourth ";
          return $sql;
      }
      public function queryStudentDeleteClass(){
          $sql = "SELECT * FROM `session` INNER JOIN grade ON session.sessionId = grade.sessionId WHERE session.classId = :first && grade.studentId = :second";
          return $sql;
      }
      public function getgradestatus(){
          $sql = "SELECT * FROM `grade` INNER JOIN session ON grade.sessionId = session.sessionId WHERE session.classId = :first && grade.studentId = :second && grade.gradeCategory = :third";
          return $sql;
      }
      public function getgrades(){
          $sql = "SELECT * FROM `grade` WHERE sessionId = :first && studentId = :second && gradeCategory = :third";
          return $sql;
      }
      public function getgradesreturn($sql,$first,$second,$third){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->execute();
          $row = $smt->fetch(PDO::FETCH_ASSOC);
          return $row;
      }
      public function getgradesperquarterquery(){
          $sql = "SELECT * FROM `grade` INNER JOIN session ON grade.sessionId = session.sessionId WHERE grade.studentId = :first && session.classId = :second && grade.gradeCategory= :third";
          return $sql;
      }
      public function getgradesperquarter($sql,$first,$second,$third){
          $smt = $this->con->prepare($sql);
          $smt->bindParam(':first',$first);
          $smt->bindParam(':second',$second);
          $smt->bindParam(':third',$third);
          $smt->execute();
          return $smt;
      }
}


